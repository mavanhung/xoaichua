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

namespace Google\Service\CloudDebugger;

class UpdateActiveBreakpointRequest extends \Google\Model
{
  protected $breakpointType = Breakpoint::class;
  protected $breakpointDataType = '';
  public $breakpoint;

  /**
   * @param Breakpoint
   */
  public function setBreakpoint(Breakpoint $breakpoint)
  {
    $this->breakpoint = $breakpoint;
  }
  /**
   * @return Breakpoint
   */
  public function getBreakpoint()
  {
    return $this->breakpoint;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateActiveBreakpointRequest::class, 'Google_Service_CloudDebugger_UpdateActiveBreakpointRequest');
