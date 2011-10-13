<?php

class ArticleController extends Controller {

    public function actionIndex() {
        $page = Page::model()->getPageByPlugin('article');

        $articles = Article::model()->getArticles(5);

        $this->breadcrumbs[] = $page->content->title;
        $this->render('index', array(
            'page' => $page,
            'articles' => $articles,
        ));
    }

    public function actionView($id) {
        $page = Page::model()->getPageByPlugin('article');

        $article = Article::model()->getArticleBySlug($id);

        $this->breadcrumbs[$page->content->title] = array('/' . $page->slug);
        $this->breadcrumbs[] = $article->content->title;
        $this->render('view', array(
            'page' => $page,
            'article' => $article,
        ));
    }

    public function actionArchive() {
        $pageModel = Page::model()->getPageByPlugin('article');
        $articles = Article::model()->getArticles();

        $total = count($articles);
        $limit = 3;
        $offset = 0;

        $page = (isset($_GET['page']) AND $_GET['page'] > 0) ? $_GET['page'] : 1;
        $pages = ceil($total / $limit);

        if ($page > 1) {
            $offset = $limit * ($page - 1);
        }
        $nextpage = $page + 1;
        $prevpage = $page - 1;

        $title = Yii::t('app', 'News archive');
        $this->breadcrumbs[] = $title;
        $this->render('archive', array(
            'title' => $title,
            'pageModel' => $pageModel,
            'articles' => $articles,
            'total' => $total,
            'page' => $page,
            'pages' => $pages,
            'offset' => $offset,
            'limit' => $limit,
            'nextpage' => $nextpage,
            'prevpage' => $prevpage,
        ));
    }

}