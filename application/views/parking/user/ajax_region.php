                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Location <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required id="region" name="region" class="form-control col-md-7 col-xs-12" >
                              <option> Select </option>
                              <?php
                                $region =array();
                                $region = explode(",",$list->region);
                                $count = count($region);
                              for ($i=0; $i < $count ; $i++) { 
                               ?>
                                <option value="<?=$region["$i"] ?>"> <?=$region[$i] ?> </option>
                              <?php  } ?>
                           </select> 
                        </div>
                      </div>