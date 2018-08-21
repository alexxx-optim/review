<?php

/**
 * @file
 * Contains \Drupal\content_entity_example\ContactAccessControlHandler.
 */

namespace Drupal\alexxx_review;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Access controller for the term entity.
 *
 * @see \Drupal\alexxx_review\Entity\AlexxxReview.
 */
class AlexxxReviewAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   *
   * Link the activities to the permissions. checkAccess is called with the
   * $operation as defined in the routing.yml file.
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view alexxx_review entity');

      case 'edit':
        return AccessResult::allowedIfHasPermission($account, 'edit alexxx_review entity');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete alexxx_review entity');
    }
    return AccessResult::allowed();
  }

  /**
   * {@inheritdoc}
   *
   * Separate from the checkAccess because the entity does not yet exist, it
   * will be created during the 'add' process.
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add alexxx_review entity');
  }

}
