<?php
/**
 * @file
 * Contains \Drupal\alexxx_review\Form\TermForm.
 */

namespace Drupal\alexxx_review\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the alexxx_review entity edit forms.
 *
 * @ingroup alexxx_review
 */
class AlexxxReviewForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\alexxx_review\Entity\AlexxxReview */
    $form = parent::buildForm($form, $form_state);
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $form_state->setRedirect('entity.alexxx_review.collection');
    $entity = $this->getEntity();
    $entity->save();
  }

}
