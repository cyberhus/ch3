<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

  <div id="page-wrapper"><div id="page">

    <div id="mobile-header-wrapper">
      <div id="mobile-header">
        <div class="mobile-logo">
          <a href="/" id="mobile-logo-link"><object type="image/svg+xml" data="/sites/all/themes/cyberhus_clean/assets/svg/logo.svg" id="main-logo">Logo</object></a>
        </div>
        <div class="mobile-search">
          <?php
            $block = module_invoke('custom_search_blocks', 'block_view', '1');
            print render($block['content']);
          ?>
        </div>
      </div>
    </div> <!-- /#mobile-header-wrapper -->

    <div id="header-wrapper">
      <div id="header"><div class="section clearfix">
        <?php print render($page['header']); ?>
      </div></div> <!-- /.section, /#header -->
    </div> <!-- /#header-wrapper -->

    <div id="highlighted-wrapper">
      <?php if($page['highlighted']) : ?>
      <div id="highlighted"><?php print render($page['highlighted']); ?></div>
      <?php else : ?>
      <div id="banner-standard">
      <?php
      switch($sub_section) {
        case 'ungibrevkasse':
          print "<img src='/" . path_to_theme() . "/assets/img/ung-i-brevkasse.jpg' />";
        break;
        case "brevkasse":
          print "<img src='/" . path_to_theme() . "/assets/img/banner-brevkasse.png' />";
        break;
        case "ung_i";
          print "<img src='/" . path_to_theme() . "/assets/img/banner-ung-i.png' />";
        break;
        case "ung_til_ung";
          print "<img src='/" . path_to_theme() . "/assets/img/banner-ung-til-ung.png' />";
        break;
        case "blog";
          print "<img src='/" . path_to_theme() . "/assets/img/banner-blog.png' />";
        break;
      }
      ?>
      </div>
      <?php endif; ?>
    </div> <!-- /#highlighted-wrapper -->

    <?php if ($breadcrumb): ?>
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>

    <?php if ($page['postface']): ?>
    <div id="postface-wrapper">
      <div id="postface"><?php print render($page['postface']); ?></div>
    </div> <!-- /#postface-wrapper -->
    <?php endif; ?>

    <div id="main-wrapper"><div id="main" class="clearfix">

      <?php if ($page['content_top']): ?>
        <div id="content-top" class="column"><div class="section">
          <?php print render($page['content_top']); ?>
        </div></div> <!-- /.section, /#content_top -->
      <?php endif; ?>

      <div id="content" class="column"><div class="section">
        <a id="main-content"></a>

        <?php if ($title): ?>
        <h1 class="title" id="page-title"><?php print $title; ?></h1>
        <?php endif; ?>

        <?php if ($messages): ?>
          <div id="messages"><?php print $messages; ?></div>
        <?php endif; ?>

        <?php if ($tabs && !empty($tabs['#primary'])): ?><div class="tabs clearfix"><?php print render($tabs); ?></div><?php endif; ?>

        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php print render($page['content']); ?>
      </div></div> <!-- /.section, /#content -->

      <div id="sidebar-first" class="column sidebar"><div class="section">
        <?php if ($page['sidebar_first']): ?>
          <?php print render($page['sidebar_first']); ?>
        <?php endif; ?>
      </div></div> <!-- /.section, /#sidebar-first -->

    </div></div> <!-- /#main, /#main-wrapper -->

    <div id="footer-wrapper">
      <div id="footer"><div class="section clearfix">
        <?php if ($page['footer_first']): ?>
          <?php print render($page['footer_first']); ?>
        <?php endif; ?>
        <?php if ($page['footer_second']): ?>
          <?php print render($page['footer_second']); ?>
        <?php endif; ?>
      </div></div> <!-- /.section, /#footer -->
      <div id="cfdp-website-links">
        <div class="cfdp-website-link-items">
          <h3>Kender du vores andre rådgivninger?</h3>
          <div class="cfdp-website-link-item first"><a href="https://cyberhus.dk"><img src="/sites/all/themes/cyberhus_clean/assets/img/cyberhus-dark.png" alt="cyberhus" /></a></div>
          <div class="cfdp-website-link-item middle"><a href="https://netstof.dk"><img src="/sites/all/themes/cyberhus_clean/assets/img/netstof-dark.png" alt="netstof" /></a></div>
          <div class="cfdp-website-link-item last"><a href="https://gruppechat.dk"><img src="/sites/all/themes/cyberhus_clean/assets/img/gruppechat-dark.png" alt="gruppechat" /></a></div>
        </div>
      </div>
    </div> <!-- /#footer-wrapper -->

    <div id="bottom-wrapper">
      <div id="bottom"><div class="section clearfix">
        <?php if ($page['bottom']): ?>
          <?php print render($page['bottom']); ?>
        <?php endif; ?>
      </div></div> <!-- /.section, /#bottom -->
    </div> <!-- /#bottom-wrapper -->

    <a href="#" id="back-to-top" title="Back to top">
      <?php print cyberhus_clean_icon_display('arrow-up'); ?>
    </a>

    <?php if ($page['mobile_footer']): ?>
    <div id="mobile-footer-wrapper">
      <div id="mobile-footer">
        <?php print render($page['mobile_footer']); ?>
      </div>
    </div> <!-- /#mobile-footer-wrapper -->
  <?php endif; ?>

  </div></div> <!-- /#page, /#page-wrapper -->
