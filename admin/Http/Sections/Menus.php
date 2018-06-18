<?php

namespace Admin\Http\Sections;

use SleepingOwl\Admin\Display\ControlLink;
use SleepingOwl\Admin\Navigation\Page;
use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use KodiComponents\Navigation\Contracts\PageInterface;
use SleepingOwl\Admin\Section;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use App\Models\Menu;

class Menus extends Section implements Initializable
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
    protected $alias = 'menu';

    public function initialize()
    {


        $this->addToNavigation($priority = 500)->setIcon('fa fa-building');

        $this->title = 'Меню';
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::tree()
            ->setValue(function ($instanse) {
                $model = $instanse;

                $link = new ControlLink(function (\Illuminate\Database\Eloquent\Model $model) {
                    return url()->current() . '/create?parent_id=' . $model->getKey(); // Генерация ссылки
                }, '+', 50);
                $v = $link->setModel($instanse)->render();

                $vr = $v->render();

                if (true) {
                    return "{$instanse->title} <div class='pull-right' style='margin-right: 120px;'>{$vr}</div>";
                } else {
                    return "{$instanse->title}";
                }
            }
            );

        $display->setNewEntryButtonText('Новый пункт меню');

        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()
            ->addBody([
                AdminFormElement::text('title', 'Пункт меню')->required(),
                AdminFormElement::text('url', 'Url')
            ->setHelpText('Если указывается локалная ссылка, то ее НУЖНО начинать со знака "/", пример "/page/vakansii". Сыылки на внешний сайт всегда начинаются с "http://".'),
                AdminFormElement::checkbox('active', 'Активен')->setDefaultValue(true),
                AdminFormElement::select('place', 'Расположение')
                    ->setOptions(Menu::PLACE)
                    ->nullable()
                    ->setHelpText('Необязательное поле. Только для корневых (главных) элементов меню.'),
            ]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        $parent_id = request()->get('parent_id');

        return AdminForm::panel()
            ->addBody([
                ($parent_id) ? AdminFormElement::select('parent_id', 'Родитель', Menu::class)->setDefaultValue($parent_id) : '',
                AdminFormElement::text('title', 'Пункт меню')->required(),
                AdminFormElement::text('url', 'Url')
                    ->setHelpText('Если указывается локалная ссылка, то ее НУЖНО начинать со знака "/", пример "/page/vakansii". Сыылки на внешний сайт всегда начинаются с "http://".'),
                AdminFormElement::checkbox('active', 'Активен')->setDefaultValue(true),
                (! $parent_id) ? AdminFormElement::select('place', 'Расположение')
                    ->setOptions(Menu::PLACE)
                    ->setHelpText('Необязательное поле. Только для корневых (главных) элементов меню.') : '',
            ]);
    }

    /**
     */
    public function onDelete($id)
    {
        // todo: remove if unused
    }

    /**
     */
    public function onRestore($id)
    {
        // todo: remove if unused
    }

    public function getCreateTitle()
    {
        return 'Создание пункта меню';
    }

    public function getEditTitle()
    {
        return 'Редактирование пункта меню';
    }
}
