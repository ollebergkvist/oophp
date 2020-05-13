<?php

namespace Anax\View;

/**
 * Template file to render edit view
 */

$filters = ["bbcode", "link", "markdown", "nl2br"];
$applyFilters = explode(',', $content->filter);

?>

<form method="post">
    <fieldset>
        <legend>Edit</legend>
        <input type="hidden" name="contentId" value="<?= esc($content->id) ?>" />

        <p>
            <label>Title:<br>
                <input type="text" name="contentTitle" value="<?= esc($content->title) ?>" />
            </label>
        </p>

        <p>
            <label>Path:<br>
                <input type="text" name="contentPath" value="<?= esc($content->path) ?>" />
        </p>

        <p>
            <label>Slug:<br>
                <input type="text" name="contentSlug" value="<?= esc($content->slug) ?>" />
        </p>

        <p>
            <label>Text:<br>
                <textarea name="contentData"><?= esc($content->data) ?></textarea>
        </p>

        <p>
            <label>Type:<br>
                <input type="radio" name="contentType" value="post" required <?php if ($content->type == "post") : ?> checked<?php endif; ?> /> Post<br>
                <input type="radio" name="contentType" value="page" required <?php if ($content->type == "page") : ?> checked <?php endif; ?> /> Page<br>
        </p>

        <p>
            <label>Filters:<br>
                <?php foreach ($filters as $filter) : ?>
                    <input type="checkbox" name="contentFilter" value="<?= $filter ?>" <?= !in_array($filter, $applyFilters) ? "" : "checked" ?>><?= $filter ?>
                <?php endforeach; ?>
        </p>



        <p>
            <label>Publish:<br>
                <input type="datetime" name="contentPublish" value="<?= esc($content->published) ?>" />
        </p>

        <p>
            <button type="submit" name="doSave"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
            <button type="reset"><i class="fa fa-undo" aria-hidden="true"></i> Reset</button>
            <button type="submit" name="doDelete"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
        </p>
    </fieldset>
</form>