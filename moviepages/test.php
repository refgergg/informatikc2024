<!doctype html>
<html lang="en">
<head>
    <title>Bootstrap 5 Star Rating jQuery Plugin Example</title>

    <!-- default styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />

    <!-- with v4.1.0 Krajee SVG theme is used as default (and must be loaded as below) - include any of the other theme CSS files as mentioned below (and change the theme property of the plugin) -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />

    <!-- important mandatory libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/star-rating.min.js" type="text/javascript"></script>

    <!-- with v4.1.0 Krajee SVG theme is used as default (and must be loaded as below) - include any of the other theme JS files as mentioned below (and change the theme property of the plugin) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/themes/krajee-svg/theme.js"></script>

    <!-- optionally if you need translation for your language then include locale file as mentioned below (replace LANG.js with your own locale file) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.1.2/js/locales/LANG.js"></script>
</head>

<body>

    <br/><br/><br/>
    <div class="container">
        <h3>Basic Example 1</h3>

        <label for="input-1" class="control-label">Rate This</label>
        <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="1">

        <br>
        <br>
        <h3>Basic Example 2</h3>
        <p>Support any fractional rating. For example validate a rating between 1 to 5 with a step of 0.1 for 5 stars. Drag and slide across for changing ratings for better effects on touch input devices.</p>

        <label for="input-2" class="control-label">Rate This</label>
        <input id="input-2" name="input-2" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1">

        <br>
        <br>
        <h3>Basic Example 3</h3>
        <p>A quick shortcut to generate a display only rating is by setting the displayOnly property to true. This can be useful when you wish to render a rating widget for display purpose only and prevent any editing ability for the user.</p>

        <label for="input-2" class="control-label">Likes</label>
        <input id="input-3" name="input-3" value="4.5" class="rating-loading">

        <br>
        <br>
        <h3>Basic Example 4</h3>
        <p>Use data attributes to control options. For example, hide/show display of clear button and caption.</p>

        <label for="input-4" class="control-label">Rate This</label>
        <input id="input-4" name="input-4" class="rating rating-loading" data-show-clear="false" data-show-caption="true">


        <br>
        <br>
        <h3>Basic Example 5</h3>
        <p>Initialize star control rating on any input via javascript. Note that you must remove the CSS class rating from your input markup when initializing via javascript.</p>

        <label for="input-5" class="control-label">Rate This</label>
        <input id="input-5" name="input-5" class="rating-loading" data-show-clear="false" data-show-caption="true">


        <br>
        <br>
        <h3>Basic Example 6</h3>
        <p>Set the star rating control to be readonly or disabled.</p>

        <label for="input-6" class="control-label">Readonly Input</label>
        <input id="input-6" name="input-6" class="rating rating-loading" value="0" data-min="0" data-max="5" data-step="1" data-readonly="true">

        <label for="input-7" class="control-label">Disabled Input</label>
        <input id="input-7" class="rating rating-loading" value="0" data-min="0" data-max="5" data-step="1" data-disabled="true">


        <br>
        <br>
        <h3>Basic Example 7</h3>
        <p>Control the size of stars by passing the size parameter. Use these codes in increasing order of size - xs being the smallest and xl being the largest: xs, sm, md, lg, xl.</p>

        <label for="input-7-xs" class="control-label">Extra Small Rating</label>
        <input id="input-7-xs" class="rating rating-loading" value="1" data-min="0" data-max="5" data-step="0.5" data-size="xs"><hr/>

        <label for="input-7-sm" class="control-label">Small Rating</label>
        <input id="input-7-sm" class="rating rating-loading" value="2" data-min="0" data-max="5" data-step="0.5" data-size="sm"><hr/>

        <label for="input-7-md" class="control-label">Medium Rating</label>
        <input id="input-7-md" class="rating rating-loading" value="3" data-min="0" data-max="5" data-step="0.5" data-size="md"><hr/>

        <label for="input-7-lg" class="control-label">Large Rating</label>
        <input id="input-7-lg" class="rating rating-loading" value="4" data-min="0" data-max="5" data-step="0.5" data-size="lg"><hr/>

        <label for="input-7-xl" class="control-label">Extra Large Rating</label>
        <input id="input-7-xl" class="rating rating-loading" value="5" data-min="0" data-max="5" data-step="0.5" data-size="xl">


        <br>
        <br>
        <h3>Basic Example 8</h3>
        <p>Right to left (RTL) input support. Note that you can add a containerClass for advanced styling.</p>
        <input id="input-8" name="input-8" class="rating-loading">
        <div class="clearfix"></div>

        <br>
        <br>
        <h3>Basic Example 9</h3>
        <p>Example of required attribute validation on the rating input. Try submitting the form without updating the rating. This example also shows a form reset scenario where the rating gets automatically reset to original value, when the form Reset button is clicked</p>
        <form action="#basic-example-9" method="post">
            <input id="input-9" name="input-9" required class="rating-loading">
            <hr>
            <button type="submit" class="btn btn-primary">Submit</button>&nbsp;
            <button type="reset" class="btn btn-outline-secondary">Reset</button>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $('#input-3').rating({displayOnly: true, step: 0.5});
            $('#input-5').rating({clearCaption: 'No stars yet'});
            $('#input-8').rating({rtl: true, containerClass: 'is-star'});
            $('#input-9').rating();
        });
    </script>
</body>

</html>