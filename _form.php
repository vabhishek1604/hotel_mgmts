   <div class="property-form">

       <?php $form = ActiveForm::begin(); ?>
       <h4>
           <strong>1. <?php echo Yii::t('app', 'Property Details'); ?></strong>
       </h4>
       <div class="row">
           <div class="col-lg-6">
               <?= $form->field($model, 'property_type')->radioList(['Residential' => 'Residential', 'Commercial' => 'Commercial',], ['prompt' => '']) ?>
           </div>
           <div class="col-lg-6">
               <?php
                $cats = SubType::find()->all();
                $sub_type_ids = PropSubType::find()->select('sub_type_id')->where(['property_id' => $model->id])->asArray()->all();
                $values = [];
                foreach ($sub_type_ids as  $v) {

                    array_push($values, $v['sub_type_id']);
                }

                $model->sub_type_ids = $values;

                foreach ($cats as $i => $category) {
                    $key = 0; ?>
               <div class="col-lg-6">
                   <?= $form
                            ->field($model, in_array("$category->id", $model->sub_type_ids, TRUE) ? 'sub_type_ids[' . array_search("$category->id", $model->sub_type_ids) . ']' : 'sub_type_ids[]')
                            ->dropDownList([
                                'label' => $category->name,
                                'value' => $category->id
                            ])
                        ?>
               </div>
               <?php }
                if (count($cats) == 0) {
                    echo '<li>No Sub Type found.</li>';
                } ?>
           </div>
       </div>
   </div>