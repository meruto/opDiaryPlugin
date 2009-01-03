<?php

/**
 * Diary routing.
 *
 * @package    OpenPNE
 * @author     Rimpei Ogawa <ogawa@tejimaya.com>
 */
class opDiaryPluginRouting
{
  static public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
  {
    $routing = $event->getSubject();
    $routing->prependRoute('diary_delete_default',
      new sfRoute(
        '/diary/*',
        array('module' => 'default', 'action' => 'error')
      )
    );
    $routing->prependRoute('diary_index',
      new sfRoute(
        '/diary',
        array('module' => 'diary', 'action' => 'index')
      )
    );
    $routing->prependRoute('diary_list',
      new sfRoute(
        '/diary/list',
        array('module' => 'diary', 'action' => 'list')
      )
    );
    $routing->prependRoute('diary_list_member',
      new sfPropelRoute(
        '/diary/listMember/:id',
        array('module' => 'diary', 'action' => 'listMember'),
        array('id' => '\d+'),
        array('model' => 'Member', 'type' => 'object')
      )
    );
    $routing->prependRoute('diary_list_friend',
      new sfRoute(
        '/diary/listFriend',
        array('module' => 'diary', 'action' => 'listFriend')
      )
    );
    $routing->prependRoute('diary_show',
      new sfPropelRoute(
        '/diary/:id',
        array('module' => 'diary', 'action' => 'show'),
        array('id' => '\d+'),
        array('model' => 'Diary', 'type' => 'object')
      )
    );
    $routing->prependRoute('diary_new',
      new sfRoute(
        '/diary/new',
        array('module' => 'diary', 'action' => 'new')
      )
    );
    $routing->prependRoute('diary_create',
      new sfRoute(
        '/diary/create',
        array('module' => 'diary', 'action' => 'create'),
        array('sf_method' => array('post'))
      )
    );
    $routing->prependRoute('diary_edit',
      new sfPropelRoute(
        '/diary/edit/:id',
        array('module' => 'diary', 'action' => 'edit'),
        array('id' => '\d+'),
        array('model' => 'Diary', 'type' => 'object')
      )
    );
    $routing->prependRoute('diary_update',
      new sfPropelRoute(
        '/diary/update/:id',
        array('module' => 'diary', 'action' => 'update'),
        array('id' => '\d+', 'sf_method' => array('post')),
        array('model' => 'Diary', 'type' => 'object')
      )
    );
    // TODO: remove GET method
    $routing->prependRoute('diary_delete',
      new sfPropelRoute(
        '/diary/delete/:id',
        array('module' => 'diary', 'action' => 'delete'),
        array('id' => '\d+', 'sf_method' => array('get', 'post')),
        array('model' => 'Diary', 'type' => 'object')
      )
    );
    $routing->prependRoute('diary_comment_create',
      new sfPropelRoute(
        '/diary/:id/comment/create',
        array('module' => 'diaryComment', 'action' => 'create'),
        array('id' => '\d+', 'sf_method' => array('post')),
        array('model' => 'Diary', 'type' => 'object')
      )
    );
    // TODO: remove GET method
    $routing->prependRoute('diary_comment_delete',
      new sfPropelRoute(
        '/diary/comment/delete/:id',
        array('module' => 'diaryComment', 'action' => 'delete'),
        array('id' => '\d+', 'sf_method' => array('get', 'post')),
        array('model' => 'DiaryComment', 'type' => 'object')
      )
    );
  }
}
