<!-- Open Graph protocol metas. @see: http://ogp.me -->
<meta property="og:url" content="<?php echo $page->url() ?>" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $site->title() ?>" />
<meta property="og:description" content="<?php echo $site->description() ?>" />
<?php if ($ogImage = $site->files()->findBy('name', 'og-image')): ?>
<meta property="og:image" content="<?php $ogImage->first()->url() ?>" />
<?php endif; ?>
