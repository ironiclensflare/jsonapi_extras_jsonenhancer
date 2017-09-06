<?php

namespace Drupal\jsonapi_extras_jsonformatter\Plugin\jsonapi\FieldEnhancer;

use Drupal\Component\Serialization\Json;
use Drupal\jsonapi_extras\Plugin\ResourceFieldEnhancerBase;

/**
 * Convert JSON data stored as a string into an actual JSON object for display.
 *
 * @ResourceFieldEnhancer(
 *   id = "json_enhancer",
 *   label = @Translation("JSON"),
 *   description = @Translation("Formats a JSON object based on a string.")
 * )
 */
class JSONEnhancer extends ResourceFieldEnhancerBase {
  /**
   * {@inheritdoc}
   */
  public function postProcess($value) {
    $obj = Json::decode($value);
    return $obj;
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function prepareForInput($value) {
    return $value;
  }

  /**
   * {@inheritdoc}
   */
  public function getJsonSchema() {
    return [
      'type' => 'json',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getSettingsForm(array $resource_field_info) {
    return [];
  }
}
