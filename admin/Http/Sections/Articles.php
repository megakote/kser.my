<?php

namespace Admin\Http\Sections;

use SleepingOwl\Admin\Section;
use AdminDisplay;
use AdminColumn;
use AdminFormElement;
use AdminForm;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Navigation\Page;
use KodiComponents\Navigation\Contracts\PageInterface;

use App\Models\Article;
use App\Models\ArticleCategory;


class Articles extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;


    /**
     * Initialize class.
     */
    public function initialize()
    {
        app()->booted(function() {
            $page = \AdminNavigation::getPages()->findById('articles');
            $page->setPages(function (PageInterface $subpage) {
                $subpage->addPage(new Page(Article::class))
                    ->setIcon('fa fa-building')
                    ->setTitle('Статьи');
            });
        });

//        $this->addToNavigation($priority = 500, function() {
//            return Article::count();
//        })->setIcon('fa fa-building');
//        $this->title = 'Статьи';
    }


    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatables();
        $display->setHtmlAttribute('class', 'table-primary')
        ->setColumns(
            AdminColumn::text('id', '#')->setWidth('30px'),
            AdminColumn::link('title', 'Заголовок'),
            AdminColumn::text('category.title', 'Категория'),
            AdminColumn::datetime('updated_at', 'Обновлено')->setFormat('Y-m-d')
        );

        return $display;

    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $display = AdminForm::panel();
        $display->addBody([
            AdminFormElement::text('title', 'Заголовок')->required()->unique(),
            AdminFormElement::text('description', 'Описание')->required(),
            ($id) ? AdminFormElement::text('slug', 'Короткий URL')->unique() : '',
            AdminFormElement::select('category_id', 'Категория')->setModelForOptions(new ArticleCategory)
                ->setDisplay('title')->required(),
            AdminFormElement::wysiwyg('body', 'Текст')->required()
        ]);

        return $display;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // todo: remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // todo: remove if unused
    }
}
