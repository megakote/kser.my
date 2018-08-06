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

use App\Models\News as NewsModel;


class News extends Section implements Initializable
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
//        app()->booted(function() {
//            $page = \AdminNavigation::getPages()->findById('supplier');
//            $page->setPages(function (PageInterface $subpage) {
//                $subpage->addPage(new Page(NewsModel::class))
//                    ->setIcon('fa fa-building')
//                    ->setTitle('Города');
//            });
//        });

        $this->addToNavigation($priority = 500, function() {
            return NewsModel::count();
        })->setIcon('fa fa-building');
        $this->title = 'Новости';
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
            AdminColumn::link('title', 'Заголовок')
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
            AdminFormElement::image('img', 'Изображение'),
            AdminFormElement::text('title', 'Заголовок')->required()->unique(),
            AdminFormElement::text('description', 'Описание')->required(),
            AdminFormElement::wysiwyg('body', 'Тело новости')->required()
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
