<div class="container-fluid">
   <div class="row">
        <div class="col-md-12 text-right md-right mt-2 mb-2">
                <a href="export.html" target="_blank" class="btn btn-primary">Export</a>
        </div>
       <div class="col-md-12">
            <table style="display:none;width:100%;" id="tbl" class="table table-striped table-bordered">

                <thead>
                    <tr>
                        <th class="no-filter" style="min-width: 50px">Image</th>
                        <th class="filter" style="min-width: 350px">Titre</th> 
                        <th class="category"  style="max-width: 100px">Catégorie</th>
                        <th class="subcategory"  style="max-width: 100px">Sous-catégorie</th>
                        <th class="filter"  style="max-width: 100px"> Prix </th>
                        <th class="filter"  style="max-width: 100px">EAN</th>
                        <th class="filter" style="max-width: 100px">Quantité</th>
                        <th class="status"  style="max-width: 100px">Disponible</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $row) : ?>
                    <tr>
                        <td>
                            <img src="<?php echo $row['picturePath'] ?>" width="50"/>
                        </td>
                        <td><?php echo $row['title'] ?></td>
                        <td ><?php echo $row['categoryTitle'] ?></td>
                        <td><?php echo $row['subcategoryTitle'] ?></td>
                        <td><?php echo $row['price']. '€' ?></td>
                        <td><?php echo $row['ean'] ?></td>
                        <td><?php echo $row['quantity'] ?></td>
                        <td><?php echo $row['isAvailable'] ?
                        '<span class="badge true" style="background-color: green; color: white;"><span style="display:none">true</span>' .date('d-m-Y', strtotime($row['updatedAt'])) .'</span>' :
                        '<span style="background-color: red; color: white;"  class="badge false"><span style="display:none">false</span>' . date('d-m-Y', strtotime($row['updatedAt'])) . '</span>'; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                          <th>Image</th>
                        <th class="filter">Titre</th> 
                        <th class="filter">Catégorie</th>
                        <th class="filter">Sous-catégorie</th>
                        <th class="filter"> Prix </th>
                        <th class="filter">EAN</th>
                        <th class="filter">Quantité</th>
                        <th class="filter">Disponible</th>
                    </tr>
                </tfoot>
            </table>
       </div>
</div>