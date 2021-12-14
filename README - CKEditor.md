CKEditor - Changes
==================

To works with Tailwind CSS and Tailwind Typography some changes must be done to CKEditor config under "Limit allowed HTML tags and correct faulty HTML" like removing `h5 and h6` tags.

Here under you have the defaults values on a fresh install of Drupal for the CKEditor option of "Limit allowed HTML tags and correct faulty HTML".

Defaults CKEditor values for Full HTML
--------------------------------------

```html
// admin/config/content/formats/manage/full_html
// "Limit allowed HTML tags and correct faulty HTML"
<em> <strong> <cite> <blockquote cite> <code> <ul type> <ol type start> <li> <dl> <dt> <dd> <h2 id> <h3 id> <h4 id> <h5 id> <h6 id> <s> <sup> <sub> <a href hreflang class="btn btn-primary btn-light btn-info btn-success btn-warning btn-danger btn-inverse"> <img src alt data-entity-type data-entity-uuid data-align data-caption> <table> <caption> <tbody> <thead> <tfoot> <th> <td> <tr> <p> <h1> <pre> <u> <div class="alert alert-error alert-success alert-info"> <span class="text-warning strong text-error text-primary text-secondary text-success text-danger dropcap">
```

Defaults CKEditor values for Basic HTML
---------------------------------------

```html
// admin/config/content/formats/manage/basic_html
// "Limit allowed HTML tags and correct faulty HTML"
<a href hreflang> <em> <strong> <cite> <blockquote cite> <code> <ul type> <ol type start> <li> <dl> <dt> <dd> <h2 id> <h3 id> <h4 id> <h5 id> <h6 id> <p> <br> <span> <img src alt data-entity-type data-entity-uuid data-align data-caption width height>
```
