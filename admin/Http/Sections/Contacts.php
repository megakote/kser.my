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

use App\Models\Contacts as Contacts_item;


class Contacts extends Section implements Initializable
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
//            $page = \AdminNavigation::getPages()->findById('articles');
//            $page->setPages(function (PageInterface $subpage) {
//                $subpage->addPage(new Page(Contacts_item::class))
//                    ->setIcon('fa fa-building')
//                    ->setTitle('Наши Офисы');
//            });
//        });

        $this->addToNavigation($priority = 500, function() {
            return Contacts_item::count();
        })->setIcon('fa fa-building');
        $this->title = 'Наши Офисы';
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
            AdminColumn::text('name', 'Заголовок')
        );

        return $display;

    }

    /**
     * @param int $id
     *address
    tel
    schedule
    mail
    map
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $display = AdminForm::panel();
        $display->addBody([
            AdminFormElement::text('name', 'Название точки')->required()->unique(),
            AdminFormElement::text('address', 'Адресс')->required(),
            AdminFormElement::text('tel', 'Телефон')->required(),
            AdminFormElement::text('schedule', 'График работы')->required(),
            AdminFormElement::text('mail', 'Почта')->required(),
            AdminFormElement::text('map', 'Координаты для карты')->required()
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
