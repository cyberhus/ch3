<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
?>

<?php
  $type_map = array(
    'brevkasse' => 'brevkasse',
    'forum' => 'ung-til-ung',
    'body_secret' => 'ung-til-ung',
    'image' => 'ung-til-ung',
    'blog' => 'brevkasse'
  );
  // Use Ung-i icon for municipality questions
  if (!empty($row->field_field_brevk_ungi)) {
    $type_map['brevkasse'] = 'ung-i';
  }
?>
<?php print cyberhus_clean_icon_display($type_map[$row->node_type]); ?>
