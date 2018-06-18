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

use App\Models\Form;


class Forms extends Section implements Initializable
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
            return Form::count();
        })->setIcon('fa fa-building');
        $this->title = 'Заявки';
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
            AdminColumn::custom('Откуда', function ($model) {
                return $this->model::TYPE[$model->type];
            }),
            AdminColumn::text('name', 'Имя'),
            AdminColumn::text('contact', 'Контакты'),
            AdminColumn::text('comment', 'Комментарий')
        );

        return $display;

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
