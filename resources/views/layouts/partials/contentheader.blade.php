<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>

    	@if (!empty($pageheader))
    	<?php $header = $pageheader; ?>
    	@else
    	<?php $header = ''; ?>
    	@endif
        <?php echo $header; ?>
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('adminlte_lang::message.level') }}</a></li>
        <li class="active">{{ trans('adminlte_lang::message.here') }}</li>
    </ol>
</section>