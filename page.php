<?php
$context = Timber::get_context();
$context['post'] = Timber::get_post();

Timber::render(['page-' . $post->post_name . '.twig', 'page.twig'], $context);