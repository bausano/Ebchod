@extends('layouts.admin')

@section('main')
	<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>

	<div class="admin-form">
		<form action="" method="post">
			{!! csrf_field() !!}
			<input type="hidden" name="sections_ids" id="sections_ids" value="">
			<div class="item"> <input type="text" name="title" placeholder="Article title . . ." class="expanded"> </div>
			<div class="item"> <span class="notselectable" id="add_section"><i class="fa fa-plus"></i>Add</span></div>
			<div class="item">
				<div class="sections">
					
				</div>
			</div>
			<div class="item pop-up" id="sections">
				<div class="close"> <i class="fa fa-close" style="cursor: pointer"></i> </div>
				<div class="sections-list">
				    <?= Helper::sectionList($sections->get()) ?>
				</div>
			</div>
			<div class="item">
				<textarea name="blog">
					
				</textarea>
				<script>
		            CKEDITOR.replace( 'blog' );
		        </script>
			</div>
			<div class="item"> <button type="submit"> Add blog article </button> </div>
		</form>
	</div>
@stop