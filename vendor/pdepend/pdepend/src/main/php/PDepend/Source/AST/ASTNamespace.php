<?php
/**
 * This file is part of PDepend.
 *
 * PHP Version 5
 *
 * Copyright (c) 2008-2017 Manuel Pichler <mapi@pdepend.org>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Manuel Pichler nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @copyright 2008-2017 Manuel Pichler. All rights reserved.
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */

namespace PDepend\Source\AST;

use PDepend\Source\ASTVisitor\ASTVisitor;

/**
 * Represents a php namespace node.
 *
 * @copyright 2008-2017 Manuel Pichler. All rights reserved.
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
class ASTNamespace extends AbstractASTArtifact
{
    /**
     * The unique identifier for this function.
     *
     * @var string
     */
    protected $id = null;

    /**
     * List of all {@link AbstractASTClassOrInterface}
     * objects for this namespace.
     *
     * @var AbstractASTClassOrInterface[]
     */
    protected $types = array();

    /**
     * List of all standalone {@link ASTFunction} objects
     * in this namespace.
     *
     * @var ASTFunction[]
     */
    protected $functions = array();

    /**
     * Does this namespace contain user defined functions, classes or interfaces?
     *
     * @var bool
     */
    private $userDefined = null;

    /**
     * @var bool
     */
    protected $packageAnnotation = false;

    /**
     * Constructs a new namespace for the given <b>$name</b>
     *
     * @param string $name
     */
    public function __construct($name)
    {
        parent::__construct($name);
        $this->id = spl_object_hash($this);
    }

    /**
     * Returns a id for this code node.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns <b>true</b> when at least one artifact <b>function</b> or a
     * <b>class/method</b> is user defined. Otherwise this method will return
     * <b>false</b>.
     *
     * @return bool
     *
     * @since  0.9.10
     */
    public function isUserDefined()
    {
        if ($this->userDefined === null) {
            $this->userDefined = $this->checkUserDefined();
        }
        return $this->userDefined;
    }

    /**
     * Returns <b>true</b> when at least one artifact <b>function</b> or a
     * <b>class/method</b> is user defined. Otherwise this method will return
     * <b>false</b>.
     *
     * @return bool
     *
     * @since  0.9.10
     */
    private function checkUserDefined()
    {
        foreach ($this->types as $type) {
            if ($type->isUserDefined()) {
                return true;
            }
        }
        return (count($this->functions) > 0);
    }

    /**
     * Returns an array with all {@link ASTTrait}
     * instances declared in this namespace.
     *
     * @return ASTArtifactList<ASTTrait>
     *
     * @since  1.0.0
     */
    public function getTraits()
    {
        return $this->getTypesOfType('PDepend\\Source\\AST\\ASTTrait');
    }

    /**
     * Returns an iterator with all {@link ASTClass}
     * instances within this namespace.
     *
     * @return ASTArtifactList<ASTClass>
     */
    public function getClasses()
    {
        return $this->getTypesOfType('PDepend\\Source\\AST\\ASTClass');
    }

    /**
     * Returns an iterator with all {@link ASTEnum}
     * instances within this namespace.
     *
     * @return ASTArtifactList<ASTEnum>
     */
    public function getEnums()
    {
        return $this->getTypesOfType('PDepend\\Source\\AST\\ASTEnum');
    }

    /**
     * Returns an iterator with all {@link ASTInterface}
     * instances within this namespace.
     *
     * @return ASTArtifactList<ASTInterface>
     */
    public function getInterfaces()
    {
        return $this->getTypesOfType('PDepend\\Source\\AST\\ASTInterface');
    }

    /**
     * Returns an iterator with all types of the given <b>$className</b> in this
     * namespace.
     *
     * @template T of AbstractASTClassOrInterface
     *
     * @param class-string<T> $className The class/type we are looking for.
     *
     * @return ASTArtifactList<T>
     *
     * @since  1.0.0
     */
    private function getTypesOfType($className)
    {
        $types = array();
        foreach ($this->types as $type) {
            if ($type instanceof $className && get_class($type) === $className) {
                $types[] = $type;
            }
        }
        return new ASTArtifactList($types);
    }

    /**
     * Returns all {@link AbstractASTClassOrInterface} objects in
     * this namespace.
     *
     * @return ASTArtifactList<AbstractASTClassOrInterface>
     */
    public function getTypes()
    {
        return new ASTArtifactList($this->types);
    }

    /**
     * Adds the given type to this namespace and returns the input type instance.
     *
     * @param AbstractASTClassOrInterface $type
     *
     * @return AbstractASTClassOrInterface
     */
    public function addType(AbstractASTType $type)
    {
        // Skip if this namespace already contains this type
        if (in_array($type, $this->types, true)) {
            return $type;
        }

        if ($type->getNamespace() !== null) {
            $type->getNamespace()->removeType($type);
        }

        // Set this as class namespace
        $type->setNamespace($this);
        // Append class to internal list
        $this->types[$type->getId()] = $type;

        return $type;
    }

    /**
     * Removes the given type instance from this namespace.
     *
     * @param AbstractASTClassOrInterface $type
     *
     * @return void
     */
    public function removeType(AbstractASTType $type)
    {
        if (($index = array_search($type, $this->types, true)) !== false) {
            // Remove class from internal list
            unset($this->types[$index]);
            // Remove this as parent
            $type->unsetNamespace();
        }
    }

    /**
     * Returns all {@link ASTFunction} objects in this
     * namespace.
     *
     * @return ASTArtifactList<ASTFunction>
     */
    public function getFunctions()
    {
        return new ASTArtifactList($this->functions);
    }

    /**
     * Adds the given function to this namespace and returns the input instance.
     *
     * @return ASTFunction
     */
    public function addFunction(ASTFunction $function)
    {
        if ($function->getNamespace() !== null) {
            $function->getNamespace()->removeFunction($function);
        }

        $function->setNamespace($this);
        // Append function to internal list
        $this->functions[$function->getId()] = $function;

        return $function;
    }

    /**
     * Removes the given function from this namespace.
     *
     * @return void
     */
    public function removeFunction(ASTFunction $function)
    {
        if (($index = array_search($function, $this->functions, true)) !== false) {
            // Remove function from internal list
            unset($this->functions[$index]);
            // Remove this as parent
            $function->unsetNamespace();
        }
    }

    /**
     * @return bool
     */
    public function isPackageAnnotation()
    {
        return $this->packageAnnotation;
    }

    /**
     * @param bool $packageAnnotation
     *
     * @return void
     */
    public function setPackageAnnotation($packageAnnotation)
    {
        $this->packageAnnotation = $packageAnnotation;
    }

    /**
     * ASTVisitor method for node tree traversal.
     *
     * @return void
     */
    public function accept(ASTVisitor $visitor)
    {
        $visitor->visitNamespace($this);
    }
}
