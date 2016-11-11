<?php

/*
 * @copyright   2014 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

if (!$hasSupportedFeatures = (isset($form['supportedFeatures']) && count($form['supportedFeatures']))) {
    if (isset($form['supportedFeatures'])) {
        $form['supportedFeatures']->setRendered();
    }
}

if (!$hasFields = (isset($form['featureSettings']) && count($form['featureSettings']['leadFields']))) {
    // Unset if set to prevent features tab from showing when there's no feature to show
    unset($form['featureSettings']['leadFields']);
}
if (!$hasFeatureSettings = (isset($form['featureSettings']) && (($hasFields && count($form['featureSettings']) > 1) || (!$hasFields && count($form['featureSettings']))))) {
    if (isset($form['featureSettings'])) {
        $form['featureSettings']->setRendered();
    }
}

$fieldHtml     = ($hasFields) ? $view['form']->row($form['featureSettings']['leadFields']) : '';
$fieldLabel    = ($hasFields) ? $form['featureSettings']['leadFields']->vars['label'] : '';
$fieldTabClass = ($hasFields) ? '' : ' hide';
unset($form['featureSettings']['leadFields']);

?>

<?php if (!empty($description)): ?>
    <div class="alert alert-info">
        <?php echo $description; ?>
    </div>
<?php endif; ?>
<ul class="nav nav-tabs pr-md pl-md">
    <li class="active" id="details-tab"><a href="#details-container" role="tab" data-toggle="tab"><?php echo $view['translator']->trans('mautic.plugin.integration.tab.details'); ?></a></li>

</ul>

<?php echo $view['form']->start($form); ?>
<!--/ tabs controls -->
<div class="tab-content pa-md bg-white">
    <div class="tab-pane fade in active bdr-w-0" id="details-container">
        <?php echo $view['form']->row($form['isPublished']); ?>
        <?php echo $view['form']->row($form['apiKeys']); ?>
    </div>

</div>
<?php echo $view['form']->end($form); ?>