
<?php if($article_category === 'Analysis') { ?>

    <p>A news analysis is based on factual reporting and adheres to the general guidelines for news reports, although an analysis incorporates the expertise of the author and may offer interpretations and conclusions.</p>
    
<?php } else if($article_category === 'News') { ?>

    <p>A news report is based on facts, either observed and verified by the author or verified from knowledgeable sources. This includes perspectives from multiple viewpoints on a particular issue, unlike public relations or propaganda. News reports do not incorporate the opinion of the author.</p>

<?php } else if($article_category === 'Opinion') { ?>

    <p>An opinion piece advocates for ideas and draw conclusions based on the author’s interpretation of facts and data. Opinion pieces may include reported facts or quotes, but emphasize the author’s own thoughts, personal preferences and conclusions.</p>

<?php } else if($article_category === 'Sponsored') { ?>

    <p>Sponsored content may look somewhat like any of the above but is produced on behalf of, at the behest of, or by an individual or organization that has paid the news provider for its placement. It does not meet the standards of impartial journalism.</p>

<?php } ?>

<p>The News Beat publishes five different types of articles: <a href="../article-types/?referrer=<?php echo urlencode(get_current_url());?>">news, analysis, opinion, and advertiser content</a>.</p>
