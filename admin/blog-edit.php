<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Edit: [Title] - Tempo Traveller NCR</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include require $_SERVER['DOCUMENT_ROOT'] . '/admin/assets/components/navbar.php'; ?>
        <div id="layoutSidenav">
            <?php include require $_SERVER['DOCUMENT_ROOT'] . '/admin/assets/components/sidebar.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Blog List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Blog List</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Edit Blog
                            </div>
                            <div class="card-body">
                                <div>
                                <h2>Edit New Blog</h2>
                                <form action="#" method="POST" enctype="multipart/form-data">

                                    <!-- Blog Title -->
                                    <div class="mb-3">
                                    <label for="title" class="form-label">Blog Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                    </div>

                                    <!-- Blog Slug (optional) -->
                                    <div class="mb-3">
                                    <label for="slug" class="form-label">Slug (URL Friendly Title)</label>
                                    <input type="text" class="form-control" id="slug" name="slug">
                                    <div class="form-text">Example: "how-to-start-blogging"</div>
                                    </div>

                                    <!-- Blog Category -->
                                    <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" id="category" name="category" required>
                                        <option value="" disabled selected>Select category</option>
                                        <option value="tech">Tech</option>
                                        <option value="travel">Travel</option>
                                        <option value="lifestyle">Lifestyle</option>
                                        <option value="business">Business</option>
                                    </select>
                                    </div>

                                    <!-- Blog Image -->
                                    <div class="mb-3">
                                    <label for="image" class="form-label">Blog Image</label>
                                    <input class="form-control" type="file" id="image" name="image" accept="image/*" required>
                                    </div>

                                    <!-- Short Description -->
                                    <div class="mb-3">
                                    <label for="short_desc" class="form-label">Short Description</label>
                                    <textarea class="form-control" id="short_desc" name="short_desc" rows="2" required></textarea>
                                    </div>

                                    <!-- Full Blog Content -->
                                    <div class="mb-3">
                                    <label for="content" class="form-label">Full Content</label>
                                    <textarea class="form-control" id="content" name="content" rows="6" required></textarea>
                                    </div>

                                    <!-- Meta Title -->
                                    <div class="mb-3">
                                    <label for="meta_title" class="form-label">Meta Title (for SEO)</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title">
                                    </div>

                                    <!-- Meta Description -->
                                    <div class="mb-3">
                                    <label for="meta_description" class="form-label">Meta Description (for SEO)</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description" rows="2"></textarea>
                                    </div>

                                    <!-- Blog Status -->
                                    <div class="mb-3">
                                    <label class="form-label">Status</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="published" value="published" checked>
                                        <label class="form-check-label" for="published">Published</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="draft" value="draft">
                                        <label class="form-check-label" for="draft">Draft</label>
                                    </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Edit Blog
                                    </button>

                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include require $_SERVER['DOCUMENT_ROOT'] . '/admin/assets/components/footer.php'; ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
