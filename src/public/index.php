<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!---Title--->
    <title>Notflix</title>
    <!---Icon--->
    <link rel="icon" href="images/icon/logo.ico">
    <!---Stylesheet--->
    <!---Global--->
    <link rel="stylesheet" type="text/css" href="styles/template/globals.css">
    <!---Page--->
    <!---Script--->
</head>

<body>
    <div style="background-color: black; width: 100%;">
        <h1 class="text-white">Header 1</h1>
        <h2 class="text-white">Header 2</h2>
        <h3 class="text-white">Header 3</h3>
        <h4 class="text-white">Header 4</h4>
        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras imperdiet facilisis aliquam. Phasellus ultricies dui nunc, sit amet dictum massa rhoncus ut. Duis euismod fringilla enim, nec egestas sem ultrices non. Sed a tempus lectus. Aliquam accumsan pulvinar nisi ac bibendum. Nulla sagittis laoreet urna sit amet viverra. Fusce vel erat sit amet lacus interdum auctor. Pellentesque imperdiet est rutrum, lacinia orci eget, blandit turpis. Pellentesque tincidunt, leo vitae varius facilisis, eros urna cursus arcu, id sagittis dui velit in dui.</p>
        <div style="display:flex; flex-direction: column; width:250px;">
            <button class="button-red button-text red-glow">Button Red</button>
            <button class="button-white button-text">Button White</button>
            <button class="button-blue button-text">Button Blue</button>
            <button class="button-green button-text">Button Green</button>
        </div>
        <form>
            <div style="display:flex; flex-direction: column; flex-direction: column;">
                <label class="field-text text-white">Field</label>
                <input type="text">
                <label class="field-text text-white">Phone Number</label>
                <input type="text" placeholder="123-45-678">
                <label class="field-text text-white">Field<span class="req">*</span></label>
                <input type="text">
                <label class="field-text text-white">Description</label>
                <input type="text" class="description-input">
            </div>
        </form>
        <div>
            <button class="button-pagination white-dim-glow">1</button>
        </div>
    </div>
</body>

</html>