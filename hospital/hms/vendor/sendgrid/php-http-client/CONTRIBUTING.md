Hello! Thank you for choosing to help contribute to one of the SendGrid open source projects. There are many ways you can contribute and help is always welcome.  We merely ask that you follow the following contribution policies.

- [CLAs and CCLAs](#cla)
- [Roadmap & Milestones](#roadmap)
- [Feature Request](#feature-request)
- [Submit a Bug Report](#submit-a-bug-report)
- [Improvements to the Codebase](#improvements-to-the-codebase)
- [Understanding the Code Base](#understanding-the-codebase)
- [Testing](#testing)
- [Style Guidelines & Naming Conventions](#style-guidelines-and-naming-conventions)
- [Creating a Pull Request](#creating-a-pull-request)
- [Code Reviews](#code-reviews)

<a name="roadmap"></a>
We use [Milestones](https://github.com/sendgrid/php-http-client/milestones) to help define current roadmaps, please feel free to grab an issue from the current milestone. Please indicate that you have begun work on it to avoid collisions. Once a PR is made, community review, comments, suggestions, and additional PRs are welcomed and encouraged.

<a name="cla"></a>
## CLAs and CCLAs

Before you get started, SendGrid requires that a SendGrid Contributor License Agreement (CLA) be filled out by every contributor to a SendGrid open source project.

Our goal with the CLA is to clarify the rights of our contributors and reduce other risks arising from inappropriate contributions.  The CLA also clarifies the rights SendGrid holds in each contribution and helps to avoid misunderstandings over what rights each contributor is required to grant to SendGrid when contributing.  In this way, the CLA encourages broad participation by our open source community and helps us build strong open source projects, free from any individual contributor withholding or revoking rights to any contribution.

SendGrid does not merge a pull request made against a SendGrid open source project until that pull request is associated with a signed CLA. Copies of the CLA are available [here](https://gist.github.com/SendGridDX/98b42c0a5d500058357b80278fde3be8#file-sendgrid_cla).

When you create a Pull Request, after a few seconds, a comment will appear with a link to the CLA. Click the link and fill out the brief form and then click the "I agree" button and you are all set. You will not be asked to re-sign the CLA unless we make a change.

There are a few ways to contribute, which we'll enumerate below:

<a name="feature-request"></a>
## Feature Request

If you'd like to make a feature request, please read this section.

The GitHub issue tracker is the preferred channel for library feature requests, but please respect the following restrictions:

- Please **search for existing issues** to ensure we don't have duplicate bugs/feature requests.
- Please be respectful and considerate of others when commenting on issues

<a name="submit-a-bug-report"></a>
## Submit a Bug Report

Note: DO NOT include your credentials in ANY code examples, descriptions, or media you make public.

A software bug is a demonstrable issue in the code base. For us to diagnose the issue and respond as quickly as possible, please add as much detail as possible into your bug report.

Before you decide to create a new issue, please try the following:

1. Check the Github issues tab if the identified issue has already been reported, if so, please add a +1 to the existing post.
2. Update to the latest version of this code and check if the issue has already been fixed
3. Copy and fill in the Bug Report Template we have provided below

### Please use our Bug Report Template

To make the process easier, we've included a [sample bug report template](https://github.com/sendgrid/php-http-client/ISSUE_TEMPLATE.md) (borrowed from [Ghost](https://github.com/TryGhost/Ghost/)). The template uses [GitHub flavored markdown](https://help.github.com/articles/github-flavored-markdown/) for formatting.

<a name="improvements-to-the-codebase"></a>
## Improvements to the Codebase

We welcome direct contributions to the php-http-client code base. Thank you!

### Development Environment ###

#### Install and Run Locally ####

##### Prerequisites #####

- PHP 5.6 or 7.0
- [Composer](https://getcomposer.org/)

##### Initial setup: #####

```bash
git clone https://github.com/sendgrid/php-http-client.git
cd php-http-client
```

### Environment Variables

First, get your free SendGrid account [here](https://sendgrid.com/free?source=php-http-client).

Next, update your environment with your [SENDGRID_API_KEY](https://app.sendgrid.com/settings/api_keys).

```bash
echo "export SENDGRID_API_KEY='YOUR_API_KEY'" > sendgrid.env
echo "sendgrid.env" >> .gitignore
source ./sendgrid.env
```

##### Execute: #####

See the [examples folder](https://github.com/sendgrid/php-http-client/tree/master/examples).

<a name="understanding-the-codebase"></a>
## Understanding the Code Base

**/examples**

Working examples that demonstrate usage.

**/test/unit**

Unit tests.

**/lib/SendGrid/Client.php**

An HTTP client with a fluent interface using method chaining and reflection. By returning self on [__call](https://github.com/sendgrid/php-http-client/blob/master/lib/client.php#L212) and [_()](https://github.com/sendgrid/php-http-client/blob/master/lib/client.pph#L198), we can dynamically build the URL using method chaining and [__call](https://github.com/sendgrid/php-http-client/blob/master/lib/client.php#L212) allows us to dynamically receive the method calls to achieve reflection.

This allows for the following mapping from a URL to a method chain:

`/api_client/{api_key_id}/version` maps to `client->api_client().->_($api_key_id)->version-><method>()` where <method> is a [HTTP verb](https://github.com/sendgrid/php-http-client/blob/master/lib/client.php#L94).

**/lib/SendGrid/Config.php**

Loads the environment variables.

<a name="testing"></a>
## Testing

All PRs require passing tests before the PR will be reviewed.

All test files are in the [`/test/unit`](https://github.com/sendgrid/php-http-client/tree/master/test/unit) directory.

For the purposes of contributing to this repo, please update the [`ClientTest.php`](https://github.com/sendgrid/php-http-client/blob/master/test/unit/ClientTest.php) file with unit tests as you modify the code.

```bash
composer install
cd test/unit
../../vendor/bin/phpunit . --bootstrap bootstrap.php --filter test*
```

<a name="style-guidelines-and-naming-conventions"></a>
## Style Guidelines & Naming Conventions

Generally, we follow the style guidelines as suggested by the official language. However, we ask that you conform to the styles that already exist in the library. If you wish to deviate, please explain your reasoning.

- [pear coding standards](https://pear.php.net/manual/en/standards.php)

Please run your code through:

- [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer)

<a name="creating-a-pull-request"></a>
## Creating a Pull Request

1. [Fork](https://help.github.com/fork-a-repo/) the project, clone your fork,
   and configure the remotes:

   ```bash
   # Clone your fork of the repo into the current directory
   git clone https://github.com/sendgrid/php-http-client
   # Navigate to the newly cloned directory
   cd php-http-client
   # Assign the original repo to a remote called "upstream"
   git remote add upstream https://github.com/sendgrid/php-http-client
   ```

2. If you cloned a while ago, get the latest changes from upstream:

   ```bash
   git checkout <dev-branch>
   git pull upstream <dev-branch>
   ```

3. Create a new topic branch (off the main project development branch) to
   contain your feature, change, or fix:

   ```bash
   git checkout -b <topic-branch-name>
   ```

4. Commit your changes in logical chunks. Please adhere to these [git commit
   message guidelines](http://tbaggery.com/2008/04/19/a-note-about-git-commit-messages.html)
   or your code is unlikely be merged into the main project. Use Git's
   [interactive rebase](https://help.github.com/articles/interactive-rebase)
   feature to tidy up your commits before making them public.

4a. Create tests.

4b. Create or update the example code that demonstrates the functionality of this change to the code.

5. Locally merge (or rebase) the upstream development branch into your topic branch:

   ```bash
   git pull [--rebase] upstream master
   ```

6. Push your topic branch up to your fork:

   ```bash
   git push origin <topic-branch-name>
   ```

7. [Open a Pull Request](https://help.github.com/articles/using-pull-requests/)
    with a clear title and description against the `master` branch. All tests must be passing before we will review the PR.

<a name="code-reviews"></a>
## Code Reviews
If you can, please look at open PRs and review them. Give feedback and help us merge these PRs much faster! If you don't know how, Github has some great [information on how to review a Pull Request](https://help.github.com/articles/about-pull-request-reviews/).

If you have any additional questions, please feel free to [email](mailto:dx@sendgrid.com) us or create an issue in this repo.
