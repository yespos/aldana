   <div class="x_panel">
                        <div class="x_title">
                          <h2><small>Service Category</small></h2>
                          <ul class="nav navbar-right panel_toolbox">
                           <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                          </ul>
                           <div class="clearfix"></div>
                        </div>
                   <div class="x_content">
                    <br />
                
               <div class="form-group">
                  <?php
                     $serviceCats = json_decode($list->serviceCat);
                     $i=0;
                    foreach ($servicecate as $cat) {   ?>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch" name="serviceCat[]" id="serviceCat_<?=$cat->id ?>" value="<?=$cat->id ?>" <?=in_array($cat->id,$serviceCats)?"checked":""  ?> onclick="add_cal(this.value)" /> <?=ucfirst($cat->name) ?>
                              <input type="hidden" name="default_servicecat[]" value="<?=$serviceCats[$i] ?>">
                              <input type="hidden" id="cat_price_<?=$cat->id ?>" name="cat_price_<?=$cat->id ?>" value="<?=$cat->price  ?>">
                            </label>
                          </div>
                        </div>
                    <?php $i++; } ?>
                      </div>
                  </div>
                </div>

                <input type="hidden" name="price" id="price" value="<?=$list->price  ?>">
              
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Service Type</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                   
                  <div class="form-group">
                    <?php
                    $serviceTypes = json_decode($list->serviceType);  
                    $j=0;
                    foreach ($servicetype as $type) {
                     ?>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <div class="">
                            <label>
                              <input type="checkbox" class="js-switch" name="serviceType[]" id="serviceType_<?=$type->id ?>" value="<?=$type->id ?>" <?=in_array($type->id,$serviceTypes)?"checked":""  ?> onclick="add_cal1(this.value)" /><?=ucfirst($type->name) ?>
                              <input type="hidden" name="default_servicetype[]" value="<?=$serviceTypes[$j] ?>">
                              <input type="hidden" id="type_price_<?=$type->id ?>" name="type_price_<?=$type->id ?>" value="<?=$type->price  ?>">
                            </label>
                          </div>
                        </div>
                      <?php $j++; } ?>
                    </div>
                  </div>
                </div>

                <img src="<?=base_url()?>/assets/images/visa.png" width="1" height="1" onload="cal() " /> 