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

namespace Google\Service\Dfareporting;

class CompatibleFields extends \Google\Model
{
  protected $crossDimensionReachReportCompatibleFieldsType = CrossDimensionReachReportCompatibleFields::class;
  protected $crossDimensionReachReportCompatibleFieldsDataType = '';
  public $crossDimensionReachReportCompatibleFields;
  protected $floodlightReportCompatibleFieldsType = FloodlightReportCompatibleFields::class;
  protected $floodlightReportCompatibleFieldsDataType = '';
  public $floodlightReportCompatibleFields;
  /**
   * @var string
   */
  public $kind;
  protected $pathAttributionReportCompatibleFieldsType = PathReportCompatibleFields::class;
  protected $pathAttributionReportCompatibleFieldsDataType = '';
  public $pathAttributionReportCompatibleFields;
  protected $pathReportCompatibleFieldsType = PathReportCompatibleFields::class;
  protected $pathReportCompatibleFieldsDataType = '';
  public $pathReportCompatibleFields;
  protected $pathToConversionReportCompatibleFieldsType = PathToConversionReportCompatibleFields::class;
  protected $pathToConversionReportCompatibleFieldsDataType = '';
  public $pathToConversionReportCompatibleFields;
  protected $reachReportCompatibleFieldsType = ReachReportCompatibleFields::class;
  protected $reachReportCompatibleFieldsDataType = '';
  public $reachReportCompatibleFields;
  protected $reportCompatibleFieldsType = ReportCompatibleFields::class;
  protected $reportCompatibleFieldsDataType = '';
  public $reportCompatibleFields;

  /**
   * @param CrossDimensionReachReportCompatibleFields
   */
  public function setCrossDimensionReachReportCompatibleFields(CrossDimensionReachReportCompatibleFields $crossDimensionReachReportCompatibleFields)
  {
    $this->crossDimensionReachReportCompatibleFields = $crossDimensionReachReportCompatibleFields;
  }
  /**
   * @return CrossDimensionReachReportCompatibleFields
   */
  public function getCrossDimensionReachReportCompatibleFields()
  {
    return $this->crossDimensionReachReportCompatibleFields;
  }
  /**
   * @param FloodlightReportCompatibleFields
   */
  public function setFloodlightReportCompatibleFields(FloodlightReportCompatibleFields $floodlightReportCompatibleFields)
  {
    $this->floodlightReportCompatibleFields = $floodlightReportCompatibleFields;
  }
  /**
   * @return FloodlightReportCompatibleFields
   */
  public function getFloodlightReportCompatibleFields()
  {
    return $this->floodlightReportCompatibleFields;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param PathReportCompatibleFields
   */
  public function setPathAttributionReportCompatibleFields(PathReportCompatibleFields $pathAttributionReportCompatibleFields)
  {
    $this->pathAttributionReportCompatibleFields = $pathAttributionReportCompatibleFields;
  }
  /**
   * @return PathReportCompatibleFields
   */
  public function getPathAttributionReportCompatibleFields()
  {
    return $this->pathAttributionReportCompatibleFields;
  }
  /**
   * @param PathReportCompatibleFields
   */
  public function setPathReportCompatibleFields(PathReportCompatibleFields $pathReportCompatibleFields)
  {
    $this->pathReportCompatibleFields = $pathReportCompatibleFields;
  }
  /**
   * @return PathReportCompatibleFields
   */
  public function getPathReportCompatibleFields()
  {
    return $this->pathReportCompatibleFields;
  }
  /**
   * @param PathToConversionReportCompatibleFields
   */
  public function setPathToConversionReportCompatibleFields(PathToConversionReportCompatibleFields $pathToConversionReportCompatibleFields)
  {
    $this->pathToConversionReportCompatibleFields = $pathToConversionReportCompatibleFields;
  }
  /**
   * @return PathToConversionReportCompatibleFields
   */
  public function getPathToConversionReportCompatibleFields()
  {
    return $this->pathToConversionReportCompatibleFields;
  }
  /**
   * @param ReachReportCompatibleFields
   */
  public function setReachReportCompatibleFields(ReachReportCompatibleFields $reachReportCompatibleFields)
  {
    $this->reachReportCompatibleFields = $reachReportCompatibleFields;
  }
  /**
   * @return ReachReportCompatibleFields
   */
  public function getReachReportCompatibleFields()
  {
    return $this->reachReportCompatibleFields;
  }
  /**
   * @param ReportCompatibleFields
   */
  public function setReportCompatibleFields(ReportCompatibleFields $reportCompatibleFields)
  {
    $this->reportCompatibleFields = $reportCompatibleFields;
  }
  /**
   * @return ReportCompatibleFields
   */
  public function getReportCompatibleFields()
  {
    return $this->reportCompatibleFields;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CompatibleFields::class, 'Google_Service_Dfareporting_CompatibleFields');
