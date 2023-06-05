@php
    $template = $user->layanan->template;
    $compiledTemplate = \Illuminate\Support\Facades\Blade::compileString($template);
    echo eval("?>$compiledTemplate<?php");
@endphp

