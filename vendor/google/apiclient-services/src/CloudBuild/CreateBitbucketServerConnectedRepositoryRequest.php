<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\CloudBuild;

class CreateBitbucketServerConnectedRepositoryRequest extends \Google\Model
{
  protected $bitbucketServerConnectedRepositoryType = BitbucketServerConnectedRepository::class;
  protected $bitbucketServerConnectedRepositoryDataType = '';
  public $bitbucketServerConnectedRepository;
  /**
   * @var string
   */
  public $parent;

  /**
   * @param BitbucketServerConnectedRepository
   */
  public function setBitbucketServerConnectedRepository(BitbucketServerConnectedRepository $bitbucketServerConnectedRepository)
  {
    $this->bitbucketServerConnectedRepository = $bitbucketServerConnectedRepository;
  }
  /**
   * @return BitbucketServerConnectedRepository
   */
  public function getBitbucketServerConnectedRepository()
  {
    return $this->bitbucketServerConnectedRepository;
  }
  /**
   * @param string
   */
  public function setParent($parent)
  {
    $this->parent = $parent;
  }
  /**
   * @return string
   */
  public function getParent()
  {
    return $this->parent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreateBitbucketServerConnectedRepositoryRequest::class, 'Google_Service_CloudBuild_CreateBitbucketServerConnectedRepositoryRequest');
