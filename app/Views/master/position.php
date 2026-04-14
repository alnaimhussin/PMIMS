
<div class="content-wrapper" style="height:100%; padding-bottom:60px">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Position Master</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Position Master</li>
          </ol>
        </div>
      </div>
    </div>
  </section> 
  <section class="content"> 
    <div class="container-fluid">
      <div class="col-12">
        <div class="row pl-2 pr-2 mt-2 mb-2">      
          <button type="button" class="col-lg-2 col-sm-12 btn btn-dark mr-1"  data-toggle="modal" data-target="#modal-lg">Add Position</button>
          <button type="button" class="col-lg-2 col-sm-12 mt-1 mt-lg-0 btn btn-dark mr-1 bg-red border-0" data-toggle="modal" data-target="#">Delete Position</button>      
        </div>  
      </div>
      <div class="row p-1 mt-2">
        <div class="col-12">
          <div class="card card-dark text-dark">
            <div class=" bg-dark bg-gradient text-white pl-2 pt-2" style="height: 2.6rem;">
              <h3 class="card-title">Position Master List</h3>
            </div>
            <div class="pt-2 pb-2" style="height:auto; padding:0px">
              <div class="card-body table-responsive p-1">
                <table id="position_table" class="table table-striped table-bordered table-head-fixed table-hover text-nowrap">
                  <thead style="text-align: center">
                    <tr style="line-height: 20px">
                      <th style="width:3%">#</th>
                      <th style="width:5%">id</th>
                      <th style="width:25%">Position</th>
                      <th style="width:25%">Sub Position</th>
                      <th style="width:25%">Description</th>
                      <th style="">Code</th>
                    </tr>
                  </thead>
                  <tbody style="font-size:14px">                    
                    <?php $n=1; if ($position) : ?>
                    <?php foreach ($position->getResult() as $post) : ?>
                    <tr style="line-height: 20px" ondblclick="viewPosition('<?php echo $post->id ?>')">
                      <td><?php echo $n ?></td>
                      <td><?php echo strtoupper($post->id) ?></td>  
                      <td><?php echo strtoupper($post->position) ?></td>  
                      <td><?php echo strtoupper($post->sub_position) ?></td>  
                      <td><?php echo strtoupper($post->description) ?></td>
                      <td><?php echo strtoupper($post->pos_code) ?></td>
                    </tr>
                    <?php $n=$n+1; endforeach; ?>
                    <?php endif; ?>                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </section>
</div>