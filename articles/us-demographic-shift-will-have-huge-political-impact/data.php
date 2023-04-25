<?php

// Everything ends up in one $article array to make it easier to dump everything and see what we're working with. Makes it easier to transition
// to a class or database in the future as well since things are more organized.

$featuredImage = array(
    'caption' => 'Voters at a San Francisco, California, polling place during the 2016 election.',
    'src' => getDistURL().'/img/people-in-voting-booth.jpg',
);

$article = array(
    'author' => getAuthor(),
    'pubdate' => PUBDATE,
    'title' => 'Women\'s March calls for reproductive rights',
    'featuredImage' => $featuredImage,
    'content' => '<p>SAN FRANCISCO &mdash; In less than 30 years, whites will no longer be the racial majority in the United States. Hispanics, African Americans and Asians – the country&rsquo;s three largest minority groups – will outnumber whites. This shift will have important implications for the nation&rsquo;s politics. Among these wide-ranging implications, perhaps none will be as significant as the evolving influence of political parties on the hearts and minds of American voters.</p>
    <p>At the turn of the 20th century, political parties in the United States were strong institutions that mobilized immigrant groups around core issues.  The political machines of both major parties – the Democrats and the Republicans – made sure that voters turned out on Election Day.</p>
    <p>Sometimes party workers even took immigrants to the polls and, on occasion, illegally paid them to vote. But with the rise of mass communications – radio, television and the Internet – candidates themselves have been able to reach out to voters directly, weakening the role of parties in the United States.</p>
    <p>As this trend continues, analysts say, minorities increasingly will need to be self-motivated to cast their ballots.</p>
    <p>&ldquo;Democrats are not going to be able to continue to rely on the votes of African Americans, Latinos and Asian Americans without being more explicit in their voter outreach and, more importantly, in their issue outreach in terms of their advocacy of the issues that matter to African Americans, Latinos and Asian Americans,&rdquo; said University of California, Berkeley political scientist Taeku Lee.</p>
    <p>Lee, an expert on racial and ethnic politics and political participation in the United States, said candidates of both parties should not be complacent when it comes to winning minority votes.</p>
    <p>&ldquo;Even though Latinos and Asian Americans are quite likely to be very religious, and those religious values and their social conservatism that attaches to that are really important to them, it doesn&rsquo;t quite connect to politics in the same way that it does for the traditional white Republican base, for whom a high level of religiosity and social conservativism in some ways become the defining issue of their politics,&rdquo; said Lee.</p>
    <p>&ldquo;So I think bread and butter issues matter quite a lot.  And when forced to choose between bread and butter issues like immigration policy, education reform, healthcare reform and social conservatism, Latinos and Asian Americans are going to pick the party that advances those bread and butter issues.&rdquo;</p>
    <p>Many analysts say that the expansion of government social welfare programs tied to these issues will shape U.S. politics in the long term.</p>
    <p>&ldquo;The political center of the country is driven not by ethnicity, but it&rsquo;s driven by benefits,&rdquo; said American Enterprise Institute political scientist David Miller, who noted that America&rsquo;s changing demographics will likely play a subordinate role to more general trends in national politics.</p>
    <p>&ldquo;People who are receiving Medicare and Social Security are going to be reluctant to vote for candidates of either party who threaten those programs in any way,&rdquo; said Miller. &ldquo;That&rsquo;s equally true of people who receive major benefits from Welfare and Medicaid.</p>
    <p>Despite a significant rise in minority Democratic voters in recent decades, many analysts expect Hispanics, Asians and African Americans to vote increasingly along economic lines. As more minority voters enter the nation&rsquo;s middle and upper classes, they say the Republican Party will have an opportunity to replenish its base of largely aging white voters, particularly if the GOP can effectively address illegal immigration – a key gateway issue for Hispanics.</p>
    <p>&ldquo;It&rsquo;s better for minorities when the two parties are competing for them,&rdquo; said Tamar Jacoby, president and CEO of ImmigrationWorks USA, a national federation of small business owners working to promote better immigration laws.  &ldquo;The worst situation is what was true for African Americans for years, when Republicans ignored them and Democrats took them for granted.&rdquo;</p>
    <p>That, analysts say, is a mistake that politicians of both parties cannot afford to repeat with the nation&rsquo;s burgeoning majority minority.</p>',
    'comments' => array(),
);

// Include file for explanation box if article stance is equal to explanation

