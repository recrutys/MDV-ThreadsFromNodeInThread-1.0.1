<?php

namespace MDV\ThreadsFromNodeInThread\XF\Pub\Controller;

use XF\Mvc\ParameterBag;

class Thread extends XFCP_Thread
{
    public function actionIndex(ParameterBag $params)
    {
        $threads_node = parent::actionIndex($params);

        $finder = \XF::finder('XF:Thread');
        $node_id = $threads_node->getParam('thread')->node_id;
        $threads = $finder->with('Forum', true)->where('node_id', $node_id)->order('post_date', 'DESC')->fetch();
        $threads_node->setParam('threads', $threads);

        return $threads_node;
    }

}