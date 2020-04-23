<?php
class ArticleManager extends Model
{
    public function getArticle()
    {
        return $this->getAll('articles', 'Article');
    }
}