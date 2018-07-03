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

        $this->addToNavigation($priority = 500, function() {
            return Client::count();
        })->setIcon('fa fa-building');
        $this->title = 'Клиенты';
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
            AdminColumn::text('name', 'Имя'),
            AdminColumn::text('id_1c', 'ИД в 1С'),
            AdminColumn::text('tel', 'Телефон'),
            AdminColumn::text('manager', 'Менеджер'),
            AdminColumn::text('user.email', 'Логин на сайте')
        );
        return $display;

    }
}
