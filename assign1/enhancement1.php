<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Enhancement Page</title>
    <link rel="stylesheet" href="styles/style.css" />
  </head>
  <body>
    <header>
      <nav>
        <?php include("navigation.php"); ?> 
      </nav>
    </header>
    <main>
		<section class="content">
			<!-- Main content goes here -->
			<h1>Enhancement Page</h1>
			<h3>Description</h3>
			<p>
				Here's a list of enhancements that are applied to specific web pages in this website
			</p>
			<ul>
				<li><strong>The dropdown feature from the header</strong></li>
				<p>
					The <strong>dropdown feature</strong> from the header helps narrow down the choices from the selected category.<br>
					The HTML code needed for this feature is this example below:<br>
					<img 
						src="images/enhancement_example1.png"
						alt="Enhancement Example 1"
					/>
					<br><br>
					Once you select one of the choices, it will then lead to its respective web page.
					<br><br>
					The web pages that were enhanced: 
					<strong>Products</strong>,
					<strong>Activities</strong>,
					<strong>Profile pages</strong>
				</p>
			</ul>
			<h3>Resources</h3>
			<ul>
				<li>
					The <strong>dropdown feature</strong> was inspired from the Week 3 Lab activity. 
					One of the features from this activity was the select dropdown list.
					<a href="https://swinburnesarawak.instructure.com/courses/1840/files/1417122?wrap=1">
					https://swinburnesarawak.instructure.com/courses/1840/files/1417122?wrap=1
					</a>
				</li>
			<ul>
		</section>
    </main>
    <footer>
      <?php include("footer.php"); ?> 
  </footer>
  </body>
</html>
