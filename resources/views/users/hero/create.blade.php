@extends('layouts.app')

@section('title', 'Создать персонажа')

@section('content')
    <div class="block block-rounded text-body-color-light mt-20 bg-primary-dark-op js-appear-enabled animated fadeIn" data-toggle="appear">
        <div class="block-header">
            <h3 class="block-title text-body-color-light text-center">Создание персонажа</h3>
        </div>
        <div class="block-content bg-primary-dark text-center">
            <span class="font-size-md text-body-color-light">Заполните ниже следующие поля для создания нового персонажа и нажмите кнопку "Отправить", чтобы отправить вашу анкету на проверку гейм-мастерам. Они посмотрят вашу анкету, сделают замечания, если они будут, вы её исправите, если потребуется и они либо примут, либо навсегда отклонят эту анкету</span>
            <form action="" method="post" class="mt-20">
                @csrf
                <div class="form-group @error('name')is-invalid @enderror">
                    <div class="form-material form-material-primary floating">
                        <input type="text" name="name" id="name" class="form-control text-body-color-light" value="{{ old('name') }}">
                        <label for="name">Полное имя вашего персонажа</label>
                    </div>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group @error('nickname')is-invalid @enderror">
                    <div class="form-material form-material-primary floating">
                        <input type="text" name="nickname" id="nickname" class="form-control text-body-color-light" value="{{ old('nickname') }}">
                        <label for="nickname">Прозвище вашего персонажа</label>
                        <div class="form-text text-muted text-right">Если у персонажа ещё нет прозвища, оставьте это поле пустым</div>
                    </div>
                    <div class=""></div>
                    @error('nickname')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group @error('content')is-invalid @enderror">
                    <div class="form-material form-material-primary">
                        <textarea name="content" id="js-ckeditor">{{ old('content') }}</textarea>
                        <label for="content">Анкета</label>
                    </div>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group row mb-0">
                    <div class="col-sm-12 text-sm-right push">
                        <button class="btn btn-alt-primary" type="submit"><i class="si si-check mr-10"></i>Отправить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        jQuery(function(){
            // Init full text editor
            if (jQuery('#js-ckeditor:not(.js-ckeditor-enabled)').length) {

                CKEDITOR.replace('js-ckeditor', {
                    toolbar: [
                        { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                        { name: 'editing', groups: [ 'find', 'selection' ], items: [ 'Find', 'Replace', '-', 'SelectAll' ] },
                        '/',
                        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
                        { name: 'paragraph', groups: [ 'list', 'blocks', 'align' ], items: [ 'NumberedList', 'BulletedList', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                        { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                        { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'Smiley' ] },
                        '/',
                        { name: 'styles', items: ['Format', 'FontSize' ] },
                        { name: 'colors', items: [ 'TextColor' ] },
                        { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
                        { name: 'others', items: [ '-' ] },
                        { name: 'about', items: [ 'About' ] }
                    ],
                    language: 'ru',
                    // Adding drag and drop image upload.
                    extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
                    // Configure your file manager integration. This example uses CKFinder 3 for PHP.
                    filebrowserUploadUrl: '/ckfinder/upload/image',
                    removeDialogTabs: 'image:advanced;link:advanced,image:Link'
                });

                // Add .js-ckeditor-enabled class to tag it as activated
                jQuery('#js-ckeditor').addClass('js-ckeditor-enabled');
            }
        });
    </script>
@endsection
