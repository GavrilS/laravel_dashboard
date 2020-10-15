<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Materialize -->
    <!-- Compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    />

    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="/css/main.css" />
    <link rel="stylesheet" href="/css/media.css"/>

  <title>Website Shortcut Dashboard</title>
</head>
<body>
  <nav>
    <div class="nav-wrapper blue">
      <a href="/" class="brand-logo">
        <i class="large material-icons icon">bookmark</i>Dashboard
      </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/">Home</a></li>
      </ul>
    </div>
  </nav>
  <br>
  <br>

  <div class="container grid-container">
    @foreach ($links as $link)
      @if ($link == "empty")
        <div class="card">
          <div class="card-content card-body">
            <span class="card-title">Add a new link</span>
          </div>
          <div class="card-action">
            <a class="waves-effect waves-light btn modal-trigger" id="modal-trigger1" onClick="openMod(this.nextSibling)" href="#modal1">Add</a>
            <p class="invisible-content">{{ $loop->index }}</p>
          </div>
        </div>
      @else
        <div class="card">
          <div class="card-content card-body">
            <?php $title = $titles[$loop->index]; ?>
            <span class="card-title">{{ $title }}</span>
          </div>
          <div class="card-action">
            <?php $color = $colors[$loop->index]; ?>
            <a href="<?php echo $link; ?>" class="add-content waves-effect btn <?php echo $color; ?>" target="_blank" rel="noopener noreferrer">Open</a>
            <a href="#modal2" onClick="updateMod(this.nextSibling)" class="waves-effect waves-light yellow darken-1 btn modal-trigger">Update</a>
            <p class="invisible-content">{{ $loop->index }}</p>
            <a href="#modal3" onClick="deleteMod(this.previousSibling)" class="waves-effect waves-ligth red modal-trigger btn">Delete</a>
          </div>
        </div>
      @endif
    @endforeach
  </div>
  <br>
  <br>

  <!-- Modals -->
  <div id="modal1" class="modal">
      <div class="modal-content">
        <form action="/link-update" method="POST">
          @csrf
          @method('PUT')
          <label for="title">Title</label>
          <input type="text" id="title" name="title" placeholder="Title...">
          <br>
          <label for="website">Add website address</label>
          <input type="text" id="website" name="website" placeholder="Enter website...">
          <br>
          <label for="color">Add a color</label>
          <input type="text" id="color" name="color" placeholder="Enter color...">
          <input type="number" name="shortcut-id" id="modal1_id" class="invisible-content" value="">
            <div class="modal-footer">
              <input type="submit" value="Save" class="btn waves-effect waves-teal">
              <a href="#" class="modal-close waves-effect waves-orange btn">Close</a>
            </div>
        </form>
      </div>
    </div>


    <div class="modal" id="modal2">
      <div class="modal-content">
        <form action="/link-update" method="POST">
          @csrf
          @method('PUT')
          <label for="title">Title</label>
          <input type="text" id="title" name="title" placeholder="Title...">
          <br>
          <label for="website">Add a new website address</label>
          <input type="text" id="website" name="website" placeholder="New website address...">
          <label for="color">Change color</label>
          <input type="text" id="color" name="color" placeholder="Enter color...">
          <input type="number" name="shortcut-id" id="modal2_id" class="invisible-content" value="">
          <div class="modal-footer">
            <input type="submit" value="Update" class="btn waves-effect waves-teal">
              <a href="#" class="modal-close waves-effect waves-orange btn">Close</a>
          </div>
        </form>
      </div>
    </div>

    <div class="modal" id="modal3">
      <h4 class="para-container">Are you sure you want to delete the website shortcut from the dashboard?</h4>
      <form action="/remove-link" method="post">
        @csrf
        @method('DELETE')
        <input type="number" name="shortcut-id" id="modal3_id" class="invisible-content" value="">
        <div class="modal-footer">
          <input type="submit" value="Delete" class="btn waves-effect waves-teal">
          <a href="#" class="modal-close waves-effect waves-orange btn">Close</a>
      </form>
      </div>
    </div>

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
      $(document).ready(function(){
        $('.modal').modal();
      });
    </script>
    <script src="/js/main.js"></script>
</body>
</html>