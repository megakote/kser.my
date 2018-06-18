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

use App\Models\Client;


class Clients extends Section implements Initializable
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
            $page = \AdminNavigation::getPages()->findById('main_page');
            $page->setPages(function (PageInterface $subpage) {
                $subpage->addPage(new Page(Client::class))
                    ->setIcon('fa fa-building')
                    ->setTitle('Клиенты')
                    ->addBadge(Client::count());
            });
        });
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
            AdminColumn::link('name', 'Название организации'),
            AdminColumn::text('link', 'Ссылка на сайт организации')
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
            AdminColumn::image('logo', 'Логотип'),
            AdminFormElement::text('name', 'Название организации')->required(),
            AdminFormElement::text('link', 'Ссылка на сайт организации')
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
