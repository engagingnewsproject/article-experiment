---
description: The Gazette Star article experiment. http://thegazettestar.com/
---

# README

## Links

[Comments on survey and stimuli Google Doc](https://docs.google.com/document/d/1j8SlXP\_sLz9LwzK7Z4BkSnFqQ3n1DscvOzE-bsCNVpA/edit)

### Article Experiment <a href="#article-experiment" id="article-experiment"></a>

This is a base template for displaying single news articles for use in various ENP research experiments. You can see an example of the page at [https://thenewsbeat.org/trust-indicators/articles/us-demographic-shift-will-have-huge-political-impact/](https://thenewsbeat.org/trust-indicators/articles/us-demographic-shift-will-have-huge-political-impact/)

### Structure <a href="#structure" id="structure"></a>

`config.json` is where most of the work will happen. A few constants get set there that are the basis for the study. What variation of the study you get is based on query parameters in the URL, like `/?author_photo=personal&author_bio=basic`. Then constants get set based on those parameters. Use the root / as the control for the study.

See `config-example.json` for details on how to use the `config.json` file.

The templating structure is manual, but simple. To create a new article, copy and paste one of the existing articles in the `/articles/` directory then rename it to the name of your article, such as `/my-new-article/`.

Then, replace the content in `/articles/my-new-article/data.php`. The variables set in data.php will get passed to the template files. `data.php` basically serves as a way to avoid setting up an actual database for each new experiment since the project is small. If you were to use this system to build an actual CMS, you'd want to use a database.

### Commenting <a href="#commenting" id="commenting"></a>

Comments just log to a file via Javascript, not a database. They're only submitted via AJAX through `/assets/js/post-with-comments.js`.

### Tracking <a href="#tracking" id="tracking"></a>

All clicks on buttons or links are tracked via Google Analytics and pass the button or link identifier, as well as which article the click came from.

### Local Set-up <a href="#local-set-up" id="local-set-up"></a>

We're using Gulp to compile. Run `npm install` from your project directory to install the node modules from `package.json`. Install (Laravel Valet)\[[https://laravel.com/docs/10.x/valet#installation](https://laravel.com/docs/10.x/valet#installation)] on your local machine and run `valet park` & `valet link` from your project directory. Lastly, run `gulp` on the command line from the project directory to serve the project up via localhost with BrowserSync.

### When Finished

Make sure to update the article-list.html file with links to all of your articles

# FTP Connection

  * [More on File Transfer Protocol](https://wpengine.com/support/sftp/?\_gl=1\*xsahx9\*\_ga\*MTUyNTgyMTM0MS4xNjc2NDIwODk4\*\_ga\_9HX6WG40N2\*MTY4MTI1MDk0MS4xNi4xLjE2ODEyNTEyMzMuMC4wLjA.)

1. Create an empty directory that you wish to first download the contents of the remote server. Open that directory in VS Code.
2. Download the VS Code [SFTP extension](https://marketplace.visualstudio.com/items?itemName=Natizyskunk.sftp) for VS Code.
3. `Ctrl+Shift+P` on Windows/Linux or `Cmd+Shift+P` on Mac open command palette, run `SFTP: config` command.
4. Sync your local directory with the remote folder. Open the command palette again and choose `SFTP: Download Project`. This will download the directory shown in the `remotePath` setting in `sftp.json` to your local open directory. Example:

```json
{
    "name": "[your chosen name]",
    "host": "ftp.stroudresearch.net",
    "protocol": "ftp",
    "port": 21,
    "username": "[FTP username]",
    "password": "[FTP password]",
    "remotePath": "/public_html/NewsBeat/2023-article-experiment",
    "uploadOnSave": false, <--- you can set this to true
    "ignore": [
        ".vscode",
        ".git",
        ".DS_Store",
        "/node_modules"
    ]
}
```

Project leader will create these for you on the hosting account:

`[FTP username]` - replace with \[FTP username] on Stache

`[FTP password]` - replace with \[FTP password] on Stache

# Live files

What files & folders should be pushed to the live hosting account.Only these folders & files need to be updated on the hosting `public_html/NewsBeat/` folder.

| Files                             |
| --------------------------------- |
| `articles/`                       |
| `assets/`                         |
| `dist/`                           |
| `inc/`                            |
| `logs/`                           |
| `full-width-qualtrics-iframe.css` |
| `index.php`                       |
| `article-list.html`               |
| `package.json`                    |
| `404.html`                        |
| `iframe-test.php`                 |
| `config.json`                     |
| `gulpfile.js`                     |
| `README.mdown`                    |
| `config.php`                      |
| `package-lock.json`               |

## Connection to server

Authenticated users can connect via FFTP with private instructions listed on [utexas.edu CME Stache page](https://stache.utexas.edu/entry/fa08b2fb7a018a2093081df086bae0a0).


# Caching & Hosting

Experiments are found at [http://thegazettestar.com/](http://thegazettestar.com/). On the stroudresearch.net GoDaddy account the site folder directory is at `/public_html/NewsBeat/`. If you need to change the forwarding address go to GoDaddy/Domains/thegazettestar.com/DNS/Fowarding and update the Destination.

To prevent caching of HTML documents, add the following line to your `.htaccess` file:

```arduino
Header set Cache-Control "no-cache, no-store, must-revalidate"
```

This sets the Cache-Control header to include the directives no-cache, no-store, and must-revalidate, which instruct browsers and intermediate caches not to cache the HTML documents.


