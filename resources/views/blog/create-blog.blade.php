@extends('layouts.app')
@section('content')
<div class="main_content">
    <div class="main_content_inner">
  <div class="uk-section uk-section-primary uk-padding-small uk-margin-bottom">
      <div class="uk-container">
        <a href="#"> Create new article</a>
      </div>
  </div>
  <div class=" uk-text-center uk-flex-center" uk-grid>
    <div class="uk-width-3-4@m uk-width-1-1">
        <div class="uk-card uk-card-default">
          <form class="uk-padding-small" action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="uk-width-1-1 uk-margin-bottom">
                <input class="uk-input" type="text" placeholder="Title" name="title" required>
            </div>
            <div class="uk-width-1-1 uk-margin-bottom">
              <select class="uk-select" id="form-stacked-select" name="category" required>
                  <option value="current event">Current Events</option>
                  <option value="fashion">Fashion</option>
                  <option value="finance">Finance</option>
                  <option value="fitness">Fitness</option>
                  <option value="movie">Movie</option>
                  <option value="news">News</option>
                  <option value="travel">Travel</option>
              </select>
            </div>
            <div class="uk-width-1-1 uk-margin-bottom">
                <textarea class="uk-textarea" type="text" placeholder="description" rows="3" name="meta_description" required style="border: 1px solid #EFF2F7;"></textarea>
            </div>
            <div class="uk-width-1-1 uk-margin-bottom">
                <textarea id="local-upload" class="bg" placeholder="content" name="description"></textarea>
            </div>
            <!-- <div class="uk-width-1-1 uk-margin-bottom">
                <input type="file" name="image">
            </div> -->

            <div class="uk-width-1-1 drag-area uk-height-medium uk-flex uk-flex-middle uk-text-center uk-flex-middle uk-flex-column uk-margin-bottom">
              <span class="cloud-upload" uk-icon="icon: cloud-upload" style=""><i class="uil-cloud-upload uk-margin-top"></i></span><br/>
              <h3 class="uk-text-center">Drag & Drop Your File</h3>
              <span class="">OR</span><br/>
              <button class="uk-button uk-button-primary" type="button"  tabindex="-1">Browse To Upload</button>
              <input type="file" hidden name="image">
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
@endsection