<?php

namespace Admin\Http\Sections;

use App\Models\Client;
use SleepingOwl\Admin\Section;
use AdminDisplay;
use AdminColumn;
use AdminFormElement;
use AdminForm;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Navigation\Page;
use KodiComponents\Navigation\Contracts\PageInterface;

use App\User;


class Users extends Section implements Initializable
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
            return User::count();
        })->setIcon('fa fa-building');
        $this->title = 'Юзеры';
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
            AdminColumn::text('client.1c_id', 'ИД в 1С'),
            AdminColumn::text('email', 'Логин'),
            AdminColumn::text('is_admin', 'админ ?'),
            AdminColumn::custom('Заявок', function ($model){
                return $model->client->orders->count();
            })
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
            AdminFormElement::text('name', 'Имя'),
            AdminFormElement::text('email', 'Логин')->required(),
            AdminFormElement::select('1c_id', 'Пользователь 1С')->setModelForOptions(new Client())
                ->setDisplay('1c_id')->required(),
            AdminFormElement::checkbox('is_admin', 'админ ?')
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
