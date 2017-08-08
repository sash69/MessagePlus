<?php

namespace Drupal\messageplus\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure settings for this site.
 */
class messageplusSettingsForm extends ConfigFormBase {
  /** 
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'messageplus_admin_settings';
  }

  /** 
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'messageplus.settings',
    ];
  }
  
  /** 
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('messageplus.settings');

    $form['text_to_add'] = array(
      '#type' => 'textfield',
      '#title' => t('Text to add'),
      '#default_value' => $config->get('messageplus.text_to_add'),
      '#description' => t('Enter text that is added as status text when new article is created'),
      '#required' => TRUE,
    );

    return parent::buildForm($form, $form_state);
  }

  /** 
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('messageplus.settings');
    $t = $form_state->getValue('text_to_add');
    $config->set('messageplus.text_to_add', $form_state->getValue('text_to_add'));
    $config->save();
    
    parent::submitForm($form, $form_state);
  }
}