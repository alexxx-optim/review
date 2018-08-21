<?php

namespace Drupal\alexxx_review\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\EntityChangedTrait;

/**
 * @file
 * Contains \Drupal\alexxx_review\Entity\AlexxxReview.
 */

/**
 * Defines the AlexxxReview entity.
 *
 * @ingroup alexxx_review
 *
 * @ContentEntityType(
 *   id = "alexxx_review",
 *   label = @Translation("Alexxx Review entity"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" =
 *   "Drupal\alexxx_review\Entity\Controller\AlexxxReviewListBuilder",
 *     "form" = {
 *       "add" = "Drupal\alexxx_review\Form\AlexxxReviewForm",
 *       "edit" = "Drupal\alexxx_review\Form\AlexxxReviewForm",
 *       "delete" = "Drupal\alexxx_review\Form\AlexxxReviewDeleteForm",
 *     },
 *     "access" = "Drupal\alexxx_review\AlexxxReviewAccessControlHandler",
 *     "views_data" = "Drupal\alexxx_review\AlexxxReviewViewsData",
 *   },
 *   list_cache_contexts = { "user" },
 *   base_table = "alexxx_review",
 *   admin_permission = "administer alexxx_review entity",
 *   entity_keys = {
 *     "id" = "id",
 *     "title" = "title",
 *     "description" = "description",
 *     "url" = "url",
 *     "changed" = "changed",
 *   },
 *   links = {
 *     "canonical" = "/alexxx_review/{alexxx_review}",
 *     "edit-form" = "/alexxx_review/{alexxx_review}/edit",
 *     "delete-form" = "/alexxx_review/{alexxx_review}/delete",
 *     "collection" = "/alexxx_review/list"
 *   },
 *   field_ui_base_route = "entity.alexxx_review.settings",
 * )
 */
class AlexxxReview extends ContentEntityBase {

  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   *
   * When a new entity instance is added, set the user_id entity reference to
   * the current user as the creator of the instance.
   */
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
    // Default author to current user.
    $values += [
      'user_id' => \Drupal::currentUser()->id(),
    ];
  }

  /**
   * {@inheritdoc}
   *
   * Define the field properties here.
   *
   * Field name, type and size determine the table structure.
   *
   * In addition, we can define how the field and its content can be manipulated
   * in the GUI. The behaviour of the widgets used can be determined here.
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {

    // Standard field, used as unique if primary index.
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the Alexxx Review entity.'))
      ->setReadOnly(TRUE);

    $fields['title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Title'))
      ->setDescription(t('The title of the Alexxx entity.'))
      ->setSettings([
        'default_value' => '',
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -6,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -6,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['description'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Description'))
      ->setDescription(t('The description of the Alexxx entity.'))
      ->setSettings([
        'default_value' => '',
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -6,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -6,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['url'] = BaseFieldDefinition::create('string')
      ->setLabel(t('URL'))
      ->setDescription(t('The URL of the Alexxx entity.'))
      ->setSettings([
        'default_value' => '',
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'link',
        'weight' => -6,
      ])
      ->setDisplayOptions('form', [
        'type' => 'link',
        'weight' => -6,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}
