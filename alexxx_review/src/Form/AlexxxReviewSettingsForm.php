<?php

/**
 * @file
 * Contains \Drupal\alexxx_review\Form\TermSettingsForm.
 */

namespace Drupal\alexxx_review\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ContentEntityExampleSettingsForm.
 *
 * @package Drupal\alexxx_review\Form
 *
 * @ingroup alexxx_review
 */
class AlexxxReviewSettingsForm extends FormBase {

  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'alexxx_review_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Empty implementation of the abstract submit class.
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['alexxx_review_settings']['#markup'] = 'Settings form for Alexxx entity content. Manage field settings here.';
    return $form;
  }

}
