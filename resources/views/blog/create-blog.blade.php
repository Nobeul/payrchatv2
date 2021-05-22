@extends('layouts.app')
@section('content')
<div class="main_content">
    <div class="main_content_inner">
  <div class="uk-section uk-section-primary uk-padding-small uk-margin-bottom">
      <div class="uk-container">
        <a href="#"> Create new article</a>
      </div>
  </div>
  <div class="uk-text-center uk-flex-center" uk-grid>
    <div class="uk-width-3-4@m uk-width-1-1">
        <div class="uk-card uk-card-default">
          <form class="uk-padding-small" action="{{ route('store.blog') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="uk-width-1-1 uk-margin-bottom">
                <input class="uk-input" type="text" placeholder="Title" name="title" >
            </div>
            <div class="uk-width-1-1 uk-margin-bottom">
              <select class="uk-select" id="form-stacked-select" name="category_id" >
                @foreach($bcategories as $val)
                  <option value="{{ $val->id }}">{{ $val->category_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="uk-width-1-1 uk-margin-bottom">
                <textarea class="uk-textarea" type="text" placeholder="description" rows="3" name="description"  style="border: 1px solid #EFF2F7;"></textarea>
            </div>
            <div class="uk-width-1-1 uk-margin-bottom">
                <textarea id="local-upload" class="bg" placeholder="content" name="content"></textarea>
            </div>
            <div class="uk-width-1-1 drag-area uk-height-medium uk-flex uk-text-center uk-flex-middle uk-flex-column uk-background-cover uk-margin-bottom" style="background-image: url('../public/holaTheme/assets/images/white-button-png.jpg');position: relative;padding-top: 70px;">              
              <span class="cloud-upload" uk-icon="icon: cloud-upload" style=""><i class="uil-cloud-upload uk-margin-top"></i></span><br/>
              <label for="image" class="uk-button uk-button-primary" type="button">Browse To Upload</label>
              <input type="file" hidden name="image" id="image" onchange="loadFile(event)">
              <img id="output" style="position: absolute;top: 0;left: 0;z-index: 100" />
            </div>
            <div class="uk-margin-bottom">
                <a href="{{ route('my.articles') }}"><i class="uil-arrow-left"></i> Go Back</a>
                <button class="uk-button uk-button-primary" type="submit">Publish</button>
            </div>
          </form>
        </div>
    </div>
</div>
</div>
 
  <script>
    var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
    }
  </script>

@endsection