<?php

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => true,
    1 => 
    array (
      '/admin/log-viewer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer::dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/log-viewer/logs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer::logs.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/log-viewer/logs/delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer::logs.delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/open' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.openhandler',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/stylesheets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.css',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/javascript' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.js',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/queries/explain' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.queries.explain',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/stripe/webhook' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cashier.webhook',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sanctum.csrf-cookie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/livewire.js' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OmSf7f2UYw2ghU0S',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/livewire.min.js.map' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::w1YSDTQsRImPdb0h',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/upload-file' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.upload-file',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/rappasoft/laravel-livewire-tables/core.min.js' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mgrz8YiB7jiKhqgn',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/rappasoft/laravel-livewire-tables/core.min.css' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PBGg0IkFQlo8n6QC',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/rappasoft/laravel-livewire-tables/thirdparty.min.js' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SEHFqxjLQ9j2ZZwc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/rappasoft/laravel-livewire-tables/thirdparty.css' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vufPHvezAFAfKHpz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/clear-cache' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.clear-cache',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/route-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/impersonate/leave' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'impersonate.leave',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/cms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MO6XIBm9ylscncvB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cms/page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.page.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cms/page/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.page.create',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cms/page/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.page.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cms/email-template' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.emailTemplate.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cms/email-template/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.emailTemplate.create',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cms/email-template/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.emailTemplate.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cms/announcement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.announcement.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cms/announcement/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.announcement.create',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cms/announcement/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.announcement.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/cms/page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.page.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/cms/page/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.page.create',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/cms/page/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.page.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/cms/email-template' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.emailTemplate.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/cms/email-template/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.emailTemplate.create',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/cms/email-template/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.emailTemplate.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/cms/announcement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.announcement.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/cms/announcement/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.announcement.create',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/cms/announcement/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.announcement.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/formbuilder' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZCRb8vLPsXlZOd8d',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/form-builder' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
            'POST' => 2,
            'PUT' => 3,
            'PATCH' => 4,
            'DELETE' => 5,
            'OPTIONS' => 6,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/form-builder/my-submissions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::my-submissions.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::my-submissions.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/form-builder/my-submissions/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::my-submissions.create',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/form-builder/forms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::forms.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::forms.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/form-builder/forms/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::forms.create',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/leads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::umP2ezkHSFHP808A',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pma' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.pma.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pma/send-pma' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.pma.sendPMA',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pma/add-pma-manually' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.pma.addFormManually',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pma/rental-evaluation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.pma.rentalRvaluation',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pma/send-pma-form' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.pma.sendPMAForm',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rental-evaluation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rental_evaluation.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/pma' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.pma.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/pma/send-pma' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.pma.sendPMA',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/pma/add-pma-manually' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.pma.addFormManually',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/pma/rental-evaluation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.pma.rentalRvaluation',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/pma/send-pma-form' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.pma.sendPMAForm',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/rental-evaluation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.rental_evaluation.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/pma' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.pma.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/pma/send-pma' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.pma.sendPMA',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/pma/add-pma-manually' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.pma.addFormManually',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/pma/rental-evaluation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.pma.rentalRvaluation',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/pma/send-pma-form' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.pma.sendPMAForm',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/rental-evaluation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.rental_evaluation.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/pma' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.pma.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/pma/send-pma' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.pma.sendPMA',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/pma/add-pma-manually' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.pma.addFormManually',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/pma/rental-evaluation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.pma.rentalRvaluation',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/pma/send-pma-form' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.pma.sendPMAForm',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/rental-evaluation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.rental_evaluation.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pma/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pma.pmaRegisterFormSubmit',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pma/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pma.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/property' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gfpDMymo5oR9wN3d',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/properties' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/properties/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.create',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/properties/performance-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.performanceReport',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/properties/send-performance-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.sendPerformanceReport',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/buildings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.buildings.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.buildings.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/buildings/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.buildings.create',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/buildings/request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.buildings.requestBuilding',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/buildings/request-building' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.buildings.request',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/showings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showings.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showings.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/showings/scheduled' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showings.scheduled',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/showings/questions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showings.questions',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/showings/schedule-multiple' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showings.scheduleMultiple',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/showings/answer-question' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showings.answerQuestion',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/properties' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.properties.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'manager.properties.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/properties/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.properties.create',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/properties/performance-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.properties.performanceReport',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/properties/send-performance-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.properties.sendPerformanceReport',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/buildings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.buildings.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'manager.buildings.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/buildings/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.buildings.create',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/buildings/request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.buildings.requestBuilding',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/buildings/request-building' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.buildings.request',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/showings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.showings.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'manager.showings.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/showings/scheduled' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.showings.scheduled',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/showings/questions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.showings.questions',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/showings/schedule-multiple' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.showings.scheduleMultiple',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/showings/answer-question' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.showings.answerQuestion',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/properties' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.properties.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'owner.properties.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/properties/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.properties.create',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/properties/performance-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.properties.performanceReport',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/properties/send-performance-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.properties.sendPerformanceReport',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/buildings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.buildings.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'owner.buildings.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/buildings/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.buildings.create',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/buildings/request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.buildings.requestBuilding',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/buildings/request-building' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.buildings.request',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/showings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.showings.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'owner.showings.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/showings/scheduled' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.showings.scheduled',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/showings/questions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.showings.questions',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/showings/schedule-multiple' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.showings.scheduleMultiple',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/showings/answer-question' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.showings.answerQuestion',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/properties' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.properties.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'agent.properties.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/properties/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.properties.create',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/properties/performance-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.properties.performanceReport',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/properties/send-performance-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.properties.sendPerformanceReport',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/buildings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.buildings.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'agent.buildings.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/buildings/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.buildings.create',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/buildings/request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.buildings.requestBuilding',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/buildings/request-building' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.buildings.request',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/showings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.showings.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'agent.showings.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/showings/scheduled' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.showings.scheduled',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/showings/questions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.showings.questions',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/showings/schedule-multiple' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.showings.scheduleMultiple',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/showings/answer-question' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.showings.answerQuestion',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/properties' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'properties.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/properties/schedule-showing-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'properties.propertyShowingAjax',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/properties/apply-showing' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'properties.applyShowing',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/properties/ask-question' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'properties.askQuestion',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/properties/multiple-schedule' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'properties.scheduleMultiple',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/property/property-info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'property.infoWindow',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/buildings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'buildings.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/building/property-info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'building.infoWindow',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/rentalapplication' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JwXOi2jo8ZIxRajT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rental-application' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rental_application.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rental-application/screening-question' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rental_application.screeningQuestion',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rental-application/submit-screening-question' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rental_application.submitScreeningQuestion',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/preview' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'previewApplicationForm',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rentalApplicationSave',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/rental-application' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.rental_application.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/rental-application/screening-question' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.rental_application.screeningQuestion',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/rental-application/submit-screening-question' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.rental_application.submitScreeningQuestion',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/rental-application' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.rental_application.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/rental-application/screening-question' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.rental_application.screeningQuestion',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/rental-application/submit-screening-question' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.rental_application.submitScreeningQuestion',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/rental-application' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.rental_application.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/rental-application/screening-question' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.rental_application.screeningQuestion',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/rental-application/submit-screening-question' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.rental_application.submitScreeningQuestion',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/rental-application' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rental_application.rentalApplication',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/rental-application/preview' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rental_application.previewApplicationForm',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/rental-application/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rental_application.rentalApplicationSave',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/rental-application/submit-rental-application' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rental_application.rentalApplicationSubmit',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/tenant' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ACJd9t9ZfGj6VAlM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tenant' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tenant.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tenant.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tenant/agreements' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tenant.tenantAgreements',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tenant/tenancy-end-notices' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tenant.tenancyEndNotice',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/tenant' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.tenant.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'manager.tenant.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/tenant/agreements' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.tenant.tenantAgreements',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/manager/tenant/tenancy-end-notices' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.tenant.tenancyEndNotice',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/tenant' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.tenant.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'owner.tenant.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/tenant/agreements' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.tenant.tenantAgreements',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/owner/tenant/tenancy-end-notices' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.tenant.tenancyEndNotice',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/tenant' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.tenant.index',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'agent.tenant.store',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/tenant/agreements' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.tenant.tenantAgreements',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/agent/tenant/tenancy-end-notices' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.tenant.tenancyEndNotice',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/tenant/agreement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tenant.agreementForm',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/tenant/agreement/save' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tenant.agreementForm.save',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/tenant/agreement/image' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tenant.saveSign',
          ),
          1 => 'forrentcentral.com',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|(?:(?:[^./]*+\\.)++)(?|/admin/log\\-viewer/logs/([^/]++)(?|(*:64)|/(?|download(*:83)|([^/]++)(?|(*:101)|/search(*:116))))|/_debugbar/c(?|lockwork/([^/]++)(*:159)|ache/([^/]++)(?:/([^/]++))?(*:194))|/stripe/payment/([^/]++)(*:227)|/livewire/preview\\-file/([^/]++)(*:267))|(?i:forrentcentral\\.com)\\.(?|/lang/([^/]++)(*:319))|(?:(?:[^./]*+\\.)++)(?|/impersonate/take/([^/]++)(?:/([^/]++))?(*:390))|(?i:forrentcentral\\.com)\\.(?|/a(?|dmin/(?|cms/(?|page/([^/]++)(?|/edit(*:469)|(*:477))|email\\-template/([^/]++)(?|/edit(*:518)|(*:526))|announcement/([^/]++)(?|/edit(*:564)|(*:572)))|form\\-builder/(?|form(?|/([^/]++)(?|(*:618)|/feedback(*:635))|s/([^/]++)(?|/(?|submissions(?|(*:675)|/(?|create(*:693)|([^/]++)(?|(*:712)|/edit(*:725)|(*:733)))|(*:743))|edit(*:756))|(*:765)))|my\\-submissions/([^/]++)(?|(*:802)|/edit(*:815)|(*:823)))|p(?|ma/(?|pma\\-pdf/([^/]++)(*:860)|edit\\-pma\\-manually/([^/]++)(*:896))|roperties/(?|sent\\-performance\\-report(?:/([^/]++))?(*:957)|([^/]++)(?|/(?|edit(*:984)|make\\-featured(*:1006))|(*:1016))|delete\\-property\\-media/([^/]++)(*:1058)))|rental\\-(?|evaluation/evaluation\\-form(?:/([^/]++))?(*:1121)|application/(?|leasing\\-application/([^/]++)(*:1174)|send\\-verification/([^/]++)(*:1210)))|buildings/(?|request\\-building/([^/]++)(?|(*:1263))|([^/]++)(?|/edit(*:1289)|(*:1298))|delete\\-building\\-media/([^/]++)(*:1340))|showings/(?|scheduled/edit/([^/]++)(*:1385)|requests(?|(?:/([^/]++))?(*:1419)|/([^/]++)(*:1437))|get\\-question/([^/]++)(*:1469))|tenant/(?|download/([^/]++)/([^/]++)/([^/]++)(*:1524)|([^/]++)(?|/(?|edit(*:1552)|make\\-featured(*:1575))|(*:1585))))|gent/(?|p(?|ma/(?|pma\\-pdf/([^/]++)(*:1632)|edit\\-pma\\-manually/([^/]++)(*:1669))|roperties/(?|sent\\-performance\\-report(?:/([^/]++))?(*:1731)|([^/]++)(?|/(?|edit(*:1759)|make\\-featured(*:1782))|(*:1792))|delete\\-property\\-media/([^/]++)(*:1834)))|rental\\-(?|evaluation/evaluation\\-form(?:/([^/]++))?(*:1897)|application/(?|leasing\\-application/([^/]++)(*:1950)|send\\-verification/([^/]++)(*:1986)))|buildings/(?|request\\-building/([^/]++)(?|(*:2039))|([^/]++)(?|/edit(*:2065)|(*:2074))|delete\\-building\\-media/([^/]++)(*:2116))|showings/(?|scheduled/edit/([^/]++)(*:2161)|requests(?|(?:/([^/]++))?(*:2195)|/([^/]++)(*:2213))|get\\-question/([^/]++)(*:2245))|tenant/(?|download/([^/]++)/([^/]++)/([^/]++)(*:2300)|([^/]++)(?|/(?|edit(*:2328)|make\\-featured(*:2351))|(*:2361))))|pply(?|(?:/([^/]++))?(*:2394)|/resume/([^/]++)/([^/]++)(*:2428)))|/manager/(?|cms/(?|page/([^/]++)(?|/edit(*:2479)|(*:2488))|email\\-template/([^/]++)(?|/edit(*:2530)|(*:2539))|announcement/([^/]++)(?|/edit(*:2578)|(*:2587)))|p(?|ma/(?|pma\\-pdf/([^/]++)(*:2625)|edit\\-pma\\-manually/([^/]++)(*:2662))|roperties/(?|sent\\-performance\\-report(?:/([^/]++))?(*:2724)|([^/]++)(?|/(?|edit(*:2752)|make\\-featured(*:2775))|(*:2785))|delete\\-property\\-media/([^/]++)(*:2827)))|rental\\-(?|evaluation/evaluation\\-form(?:/([^/]++))?(*:2890)|application/(?|leasing\\-application/([^/]++)(*:2943)|send\\-verification/([^/]++)(*:2979)))|buildings/(?|request\\-building/([^/]++)(?|(*:3032))|([^/]++)(?|/edit(*:3058)|(*:3067))|delete\\-building\\-media/([^/]++)(*:3109))|showings/(?|scheduled/edit/([^/]++)(*:3154)|requests(?|(?:/([^/]++))?(*:3188)|/([^/]++)(*:3206))|get\\-question/([^/]++)(*:3238))|tenant/(?|download/([^/]++)/([^/]++)/([^/]++)(*:3293)|([^/]++)(?|/(?|edit(*:3321)|make\\-featured(*:3344))|(*:3354))))|/c(?|ms/page/([^/]++)(*:3387)|ompleted/([^/]++)(*:3413))|/owner/(?|p(?|ma/(?|pma\\-pdf/([^/]++)(*:3460)|edit\\-pma\\-manually/([^/]++)(*:3497))|roperties/(?|sent\\-performance\\-report(?:/([^/]++))?(*:3559)|([^/]++)(?|/(?|edit(*:3587)|make\\-featured(*:3610))|(*:3620))|delete\\-property\\-media/([^/]++)(*:3662)))|rental\\-(?|evaluation/evaluation\\-form(?:/([^/]++))?(*:3725)|application/(?|leasing\\-application/([^/]++)(*:3778)|send\\-verification/([^/]++)(*:3814)))|buildings/(?|request\\-building/([^/]++)(?|(*:3867))|([^/]++)(?|/edit(*:3893)|(*:3902))|delete\\-building\\-media/([^/]++)(*:3944))|showings/(?|scheduled/edit/([^/]++)(*:3989)|requests(?|(?:/([^/]++))?(*:4023)|/([^/]++)(*:4041))|get\\-question/([^/]++)(*:4073))|tenant/(?|download/([^/]++)/([^/]++)/([^/]++)(*:4128)|([^/]++)(?|/(?|edit(*:4156)|make\\-featured(*:4179))|(*:4189))))|/p(?|ma/(?|property\\-info/([^/]++)/([^/]++)/([^/]++)(*:4253)|register/([^/]++)(?:/([^/]++))?(*:4293)|form/([^/]++)(?:/([^/]++)(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?)?(*:4371)|agent\\-form/([^/]++)(?:/([^/]++))?(*:4414)|view\\-form(?:/([^/]++)(?:/([^/]++))?)?(*:4461))|r(?|operty/([^/]++)(*:4490)|eview(?:/([^/]++))?(*:4518)))|/building/([^/]++)(*:4547)|/screening/([^/]++)/([^/]++)(*:4584)|/rental\\-application/(?|screening/([^/]++)/([^/]++)(*:4644)|apply(?|(?:/([^/]++))?(*:4675)|/resume/([^/]++)/([^/]++)(*:4709))|preview(?:/([^/]++))?(*:4740)|completed/([^/]++)(*:4767))|/tenant/agreement/([^/]++)/([^/]++)/([^/]++)(*:4821)))/?$}sDu',
    ),
    3 => 
    array (
      64 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer::logs.show',
          ),
          1 => 
          array (
            0 => 'date',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      83 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer::logs.download',
          ),
          1 => 
          array (
            0 => 'date',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      101 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer::logs.filter',
          ),
          1 => 
          array (
            0 => 'date',
            1 => 'level',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      116 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer::logs.search',
          ),
          1 => 
          array (
            0 => 'date',
            1 => 'level',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      159 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.clockwork',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      194 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.cache.delete',
            'tags' => NULL,
          ),
          1 => 
          array (
            0 => 'key',
            1 => 'tags',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      227 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cashier.payment',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      267 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.preview-file',
          ),
          1 => 
          array (
            0 => 'filename',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      319 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'locale.change',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      390 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'impersonate',
            'guardName' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'guardName',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      469 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.page.edit',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      477 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.page.update',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.page.destroy',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      518 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.emailTemplate.edit',
          ),
          1 => 
          array (
            0 => 'emailTemplate',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      526 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.emailTemplate.update',
          ),
          1 => 
          array (
            0 => 'emailTemplate',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.emailTemplate.destroy',
          ),
          1 => 
          array (
            0 => 'emailTemplate',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      564 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.announcement.edit',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      572 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.announcement.update',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.cms.announcement.destroy',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      618 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::form.render',
          ),
          1 => 
          array (
            0 => 'identifier',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::form.submit',
          ),
          1 => 
          array (
            0 => 'identifier',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      635 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::form.feedback',
          ),
          1 => 
          array (
            0 => 'identifier',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      675 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::forms.submissions.index',
          ),
          1 => 
          array (
            0 => 'fid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      693 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::forms.submissions.create',
          ),
          1 => 
          array (
            0 => 'fid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      712 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::forms.submissions.show',
          ),
          1 => 
          array (
            0 => 'fid',
            1 => 'submission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      725 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::forms.submissions.edit',
          ),
          1 => 
          array (
            0 => 'fid',
            1 => 'submission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      733 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::forms.submissions.update',
          ),
          1 => 
          array (
            0 => 'fid',
            1 => 'submission',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::forms.submissions.destroy',
          ),
          1 => 
          array (
            0 => 'fid',
            1 => 'submission',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      743 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::forms.submissions.store',
          ),
          1 => 
          array (
            0 => 'fid',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      756 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::forms.edit',
          ),
          1 => 
          array (
            0 => 'form',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      765 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::forms.show',
          ),
          1 => 
          array (
            0 => 'form',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::forms.update',
          ),
          1 => 
          array (
            0 => 'form',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::forms.destroy',
          ),
          1 => 
          array (
            0 => 'form',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      802 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::my-submissions.show',
          ),
          1 => 
          array (
            0 => 'my_submission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      815 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::my-submissions.edit',
          ),
          1 => 
          array (
            0 => 'my_submission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      823 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::my-submissions.update',
          ),
          1 => 
          array (
            0 => 'my_submission',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'formbuilder::my-submissions.destroy',
          ),
          1 => 
          array (
            0 => 'my_submission',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      860 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.pma.pma-pdf',
          ),
          1 => 
          array (
            0 => 'agreementId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      896 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.pma.editFormManually',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      957 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.sentPerformanceReport',
            'pId' => NULL,
          ),
          1 => 
          array (
            0 => 'pId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      984 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.edit',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1006 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.makeFeatured',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1016 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.update',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.destroy',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1058 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.properties.removePropertyMedia',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1121 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rental_evaluation.evaluationForm',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1174 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rental_application.leasingApplication',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1210 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.rental_application.sendRentaApplicationVerification',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1263 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.buildings.request.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.buildings.request.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1289 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.buildings.edit',
          ),
          1 => 
          array (
            0 => 'building',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1298 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.buildings.update',
          ),
          1 => 
          array (
            0 => 'building',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.buildings.destroy',
          ),
          1 => 
          array (
            0 => 'building',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1340 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.buildings.removeBuildingMedia',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1385 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showings.scheduledEdit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1419 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showings.requests',
            'showingId' => NULL,
          ),
          1 => 
          array (
            0 => 'showingId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1437 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showings.requestsStatus',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1469 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.showings.getQuestion',
          ),
          1 => 
          array (
            0 => 'question',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1524 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tenant.savePdf',
          ),
          1 => 
          array (
            0 => 'type',
            1 => 'id',
            2 => 'access_token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1552 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tenant.edit',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1575 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tenant.makeFeatured',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1585 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tenant.update',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tenant.destroy',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1632 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.pma.pma-pdf',
          ),
          1 => 
          array (
            0 => 'agreementId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1669 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.pma.editFormManually',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1731 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.properties.sentPerformanceReport',
            'pId' => NULL,
          ),
          1 => 
          array (
            0 => 'pId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1759 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.properties.edit',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1782 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.properties.makeFeatured',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1792 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.properties.update',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'agent.properties.destroy',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1834 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.properties.removePropertyMedia',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1897 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.rental_evaluation.evaluationForm',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1950 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.rental_application.leasingApplication',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1986 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.rental_application.sendRentaApplicationVerification',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2039 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.buildings.request.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'agent.buildings.request.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2065 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.buildings.edit',
          ),
          1 => 
          array (
            0 => 'building',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2074 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.buildings.update',
          ),
          1 => 
          array (
            0 => 'building',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'agent.buildings.destroy',
          ),
          1 => 
          array (
            0 => 'building',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2116 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.buildings.removeBuildingMedia',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2161 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.showings.scheduledEdit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2195 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.showings.requests',
            'showingId' => NULL,
          ),
          1 => 
          array (
            0 => 'showingId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2213 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.showings.requestsStatus',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2245 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.showings.getQuestion',
          ),
          1 => 
          array (
            0 => 'question',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2300 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.tenant.savePdf',
          ),
          1 => 
          array (
            0 => 'type',
            1 => 'id',
            2 => 'access_token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2328 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.tenant.edit',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2351 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.tenant.makeFeatured',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2361 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'agent.tenant.update',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'agent.tenant.destroy',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2394 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'applicationForm',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2428 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resumeApply',
          ),
          1 => 
          array (
            0 => 'applicationId',
            1 => 'propertyId',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2479 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.page.edit',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2488 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.page.update',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.page.destroy',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2530 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.emailTemplate.edit',
          ),
          1 => 
          array (
            0 => 'emailTemplate',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2539 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.emailTemplate.update',
          ),
          1 => 
          array (
            0 => 'emailTemplate',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.emailTemplate.destroy',
          ),
          1 => 
          array (
            0 => 'emailTemplate',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2578 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.announcement.edit',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2587 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.announcement.update',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'manager.cms.announcement.destroy',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2625 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.pma.pma-pdf',
          ),
          1 => 
          array (
            0 => 'agreementId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2662 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.pma.editFormManually',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2724 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.properties.sentPerformanceReport',
            'pId' => NULL,
          ),
          1 => 
          array (
            0 => 'pId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2752 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.properties.edit',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2775 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.properties.makeFeatured',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2785 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.properties.update',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'manager.properties.destroy',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2827 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.properties.removePropertyMedia',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2890 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.rental_evaluation.evaluationForm',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2943 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.rental_application.leasingApplication',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2979 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.rental_application.sendRentaApplicationVerification',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3032 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.buildings.request.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'manager.buildings.request.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3058 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.buildings.edit',
          ),
          1 => 
          array (
            0 => 'building',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3067 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.buildings.update',
          ),
          1 => 
          array (
            0 => 'building',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'manager.buildings.destroy',
          ),
          1 => 
          array (
            0 => 'building',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3109 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.buildings.removeBuildingMedia',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3154 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.showings.scheduledEdit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3188 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.showings.requests',
            'showingId' => NULL,
          ),
          1 => 
          array (
            0 => 'showingId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3206 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.showings.requestsStatus',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3238 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.showings.getQuestion',
          ),
          1 => 
          array (
            0 => 'question',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3293 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.tenant.savePdf',
          ),
          1 => 
          array (
            0 => 'type',
            1 => 'id',
            2 => 'access_token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3321 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.tenant.edit',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3344 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.tenant.makeFeatured',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3354 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'manager.tenant.update',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'manager.tenant.destroy',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3387 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cms.page.single',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3413 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rentalApplicationComplete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3460 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.pma.pma-pdf',
          ),
          1 => 
          array (
            0 => 'agreementId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3497 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.pma.editFormManually',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3559 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.properties.sentPerformanceReport',
            'pId' => NULL,
          ),
          1 => 
          array (
            0 => 'pId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3587 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.properties.edit',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3610 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.properties.makeFeatured',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3620 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.properties.update',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'owner.properties.destroy',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3662 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.properties.removePropertyMedia',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3725 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.rental_evaluation.evaluationForm',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3778 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.rental_application.leasingApplication',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3814 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.rental_application.sendRentaApplicationVerification',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3867 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.buildings.request.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'owner.buildings.request.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3893 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.buildings.edit',
          ),
          1 => 
          array (
            0 => 'building',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3902 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.buildings.update',
          ),
          1 => 
          array (
            0 => 'building',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'owner.buildings.destroy',
          ),
          1 => 
          array (
            0 => 'building',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3944 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.buildings.removeBuildingMedia',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3989 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.showings.scheduledEdit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4023 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.showings.requests',
            'showingId' => NULL,
          ),
          1 => 
          array (
            0 => 'showingId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4041 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.showings.requestsStatus',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4073 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.showings.getQuestion',
          ),
          1 => 
          array (
            0 => 'question',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4128 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.tenant.savePdf',
          ),
          1 => 
          array (
            0 => 'type',
            1 => 'id',
            2 => 'access_token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4156 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.tenant.edit',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4179 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.tenant.makeFeatured',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4189 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'owner.tenant.update',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'owner.tenant.destroy',
          ),
          1 => 
          array (
            0 => 'tenant',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4253 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pma.propertyInfo',
          ),
          1 => 
          array (
            0 => 'account_id',
            1 => 'user_id',
            2 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4293 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pma.pmaRegisterForm',
            'userId' => NULL,
          ),
          1 => 
          array (
            0 => 'account_id',
            1 => 'userId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4371 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pma.form',
            'owners' => NULL,
            'ap' => NULL,
            'email2' => NULL,
            'formId' => NULL,
          ),
          1 => 
          array (
            0 => 'account_id',
            1 => 'owners',
            2 => 'ap',
            3 => 'email2',
            4 => 'formId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4414 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pma.agentForm',
            'formId' => NULL,
          ),
          1 => 
          array (
            0 => 'account_id',
            1 => 'formId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4461 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pma.viewForm',
            'action' => NULL,
            'form_id' => NULL,
          ),
          1 => 
          array (
            0 => 'action',
            1 => 'form_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4490 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'property.single',
          ),
          1 => 
          array (
            0 => 'property',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4518 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'previewApplication',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4547 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'building.single',
          ),
          1 => 
          array (
            0 => 'building',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4584 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'screeningRentalApplication',
          ),
          1 => 
          array (
            0 => 'type',
            1 => 'application_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4644 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rental_application.screeningRentalApplication',
          ),
          1 => 
          array (
            0 => 'type',
            1 => 'application_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4675 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rental_application.applicationForm',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4709 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rental_application.resumeApply',
          ),
          1 => 
          array (
            0 => 'applicationId',
            1 => 'propertyId',
          ),
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4740 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rental_application.rentalApplicationPreviw',
            'id' => NULL,
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4767 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rental_application.rentalApplicationComplete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4821 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'tenant.viewTenantAgreement',
          ),
          1 => 
          array (
            0 => 'action',
            1 => 'form_id',
            2 => 'access_token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'log-viewer::dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/log-viewer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'is_super_admin',
        ),
        'uses' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@index',
        'controller' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@index',
        'as' => 'log-viewer::dashboard',
        'namespace' => NULL,
        'prefix' => 'admin/log-viewer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer::logs.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/log-viewer/logs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'is_super_admin',
        ),
        'uses' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@listLogs',
        'controller' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@listLogs',
        'as' => 'log-viewer::logs.list',
        'namespace' => NULL,
        'prefix' => 'admin/log-viewer/logs',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer::logs.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/log-viewer/logs/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'is_super_admin',
        ),
        'uses' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@delete',
        'controller' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@delete',
        'as' => 'log-viewer::logs.delete',
        'namespace' => NULL,
        'prefix' => 'admin/log-viewer/logs',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer::logs.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/log-viewer/logs/{date}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'is_super_admin',
        ),
        'uses' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@show',
        'controller' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@show',
        'as' => 'log-viewer::logs.show',
        'namespace' => NULL,
        'prefix' => 'admin/log-viewer/logs/{date}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer::logs.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/log-viewer/logs/{date}/download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'is_super_admin',
        ),
        'uses' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@download',
        'controller' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@download',
        'as' => 'log-viewer::logs.download',
        'namespace' => NULL,
        'prefix' => 'admin/log-viewer/logs/{date}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer::logs.filter' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/log-viewer/logs/{date}/{level}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'is_super_admin',
        ),
        'uses' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@showByLevel',
        'controller' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@showByLevel',
        'as' => 'log-viewer::logs.filter',
        'namespace' => NULL,
        'prefix' => 'admin/log-viewer/logs/{date}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer::logs.search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/log-viewer/logs/{date}/{level}/search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'is_super_admin',
        ),
        'uses' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@search',
        'controller' => 'Arcanedev\\LogViewer\\Http\\Controllers\\LogViewerController@search',
        'as' => 'log-viewer::logs.search',
        'namespace' => NULL,
        'prefix' => 'admin/log-viewer/logs/{date}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.openhandler' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/open',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'as' => 'debugbar.openhandler',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.clockwork' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/clockwork/{id}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'as' => 'debugbar.clockwork',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.assets.css' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/stylesheets',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'as' => 'debugbar.assets.css',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.assets.js' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/javascript',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'as' => 'debugbar.assets.js',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.cache.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '_debugbar/cache/{key}/{tags?}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'as' => 'debugbar.cache.delete',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.queries.explain' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_debugbar/queries/explain',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\QueriesController@explain',
        'as' => 'debugbar.queries.explain',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\QueriesController@explain',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cashier.payment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'stripe/payment/{id}',
      'action' => 
      array (
        'uses' => 'Laravel\\Cashier\\Http\\Controllers\\PaymentController@show',
        'controller' => 'Laravel\\Cashier\\Http\\Controllers\\PaymentController@show',
        'as' => 'cashier.payment',
        'namespace' => 'Laravel\\Cashier\\Http\\Controllers',
        'prefix' => 'stripe',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cashier.webhook' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'stripe/webhook',
      'action' => 
      array (
        'uses' => 'Laravel\\Cashier\\Http\\Controllers\\WebhookController@handleWebhook',
        'controller' => 'Laravel\\Cashier\\Http\\Controllers\\WebhookController@handleWebhook',
        'as' => 'cashier.webhook',
        'namespace' => 'Laravel\\Cashier\\Http\\Controllers',
        'prefix' => 'stripe',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sanctum.csrf-cookie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'sanctum.csrf-cookie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::OmSf7f2UYw2ghU0S' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/livewire.js',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@returnJavaScriptAsFile',
        'controller' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@returnJavaScriptAsFile',
        'as' => 'generated::OmSf7f2UYw2ghU0S',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::w1YSDTQsRImPdb0h' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/livewire.min.js.map',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@maps',
        'controller' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@maps',
        'as' => 'generated::w1YSDTQsRImPdb0h',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.upload-file' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire/upload-file',
      'action' => 
      array (
        'uses' => 'Livewire\\Features\\SupportFileUploads\\FileUploadController@handle',
        'controller' => 'Livewire\\Features\\SupportFileUploads\\FileUploadController@handle',
        'as' => 'livewire.upload-file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.preview-file' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/preview-file/{filename}',
      'action' => 
      array (
        'uses' => 'Livewire\\Features\\SupportFileUploads\\FilePreviewController@handle',
        'controller' => 'Livewire\\Features\\SupportFileUploads\\FilePreviewController@handle',
        'as' => 'livewire.preview-file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mgrz8YiB7jiKhqgn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'rappasoft/laravel-livewire-tables/core.min.js',
      'action' => 
      array (
        'uses' => 'Rappasoft\\LaravelLivewireTables\\Mechanisms\\RappasoftFrontendAssets@returnRappasoftTableJavaScriptAsFile',
        'controller' => 'Rappasoft\\LaravelLivewireTables\\Mechanisms\\RappasoftFrontendAssets@returnRappasoftTableJavaScriptAsFile',
        'as' => 'generated::mgrz8YiB7jiKhqgn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PBGg0IkFQlo8n6QC' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'rappasoft/laravel-livewire-tables/core.min.css',
      'action' => 
      array (
        'uses' => 'Rappasoft\\LaravelLivewireTables\\Mechanisms\\RappasoftFrontendAssets@returnRappasoftTableStylesAsFile',
        'controller' => 'Rappasoft\\LaravelLivewireTables\\Mechanisms\\RappasoftFrontendAssets@returnRappasoftTableStylesAsFile',
        'as' => 'generated::PBGg0IkFQlo8n6QC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::SEHFqxjLQ9j2ZZwc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'rappasoft/laravel-livewire-tables/thirdparty.min.js',
      'action' => 
      array (
        'uses' => 'Rappasoft\\LaravelLivewireTables\\Mechanisms\\RappasoftFrontendAssets@returnRappasoftTableThirdPartyJavaScriptAsFile',
        'controller' => 'Rappasoft\\LaravelLivewireTables\\Mechanisms\\RappasoftFrontendAssets@returnRappasoftTableThirdPartyJavaScriptAsFile',
        'as' => 'generated::SEHFqxjLQ9j2ZZwc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vufPHvezAFAfKHpz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'rappasoft/laravel-livewire-tables/thirdparty.css',
      'action' => 
      array (
        'uses' => 'Rappasoft\\LaravelLivewireTables\\Mechanisms\\RappasoftFrontendAssets@returnRappasoftTableThirdPartyStylesAsFile',
        'controller' => 'Rappasoft\\LaravelLivewireTables\\Mechanisms\\RappasoftFrontendAssets@returnRappasoftTableThirdPartyStylesAsFile',
        'as' => 'generated::vufPHvezAFAfKHpz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'locale.change' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lang/{lang}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'App\\Http\\Controllers\\LocaleController@change',
        'controller' => 'App\\Http\\Controllers\\LocaleController@change',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'locale.change',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.clear-cache' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/clear-cache',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:552:"function () {
            \\Illuminate\\Support\\Facades\\Artisan::call(\'config:clear\');
            \\Illuminate\\Support\\Facades\\Artisan::call(\'cache:clear\');
            \\Illuminate\\Support\\Facades\\Artisan::call(\'view:clear\');
            \\Illuminate\\Support\\Facades\\Artisan::call(\'clear-compiled\');
            \\Illuminate\\Support\\Facades\\Artisan::call(\'route:clear\');
            \\Illuminate\\Support\\Facades\\Artisan::call(\'route:cache\');
            \\Illuminate\\Support\\Facades\\Artisan::call(\'optimize:clear\');

            return \'All Clear\';
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000011bb0000000000000000";}}',
        'as' => 'admin.clear-cache',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/route-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:286:"function () {
            \\Illuminate\\Support\\Facades\\Artisan::call(\'route:clear\');
            $routes = \\Route::getRoutes();
            foreach ($routes as $route) {
                echo \'Name: [\'.($route->getName() ?: \'Unnamed\').\'] => \'.$route->uri().\'<br>\';
            }
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000011bc0000000000000000";}}',
        'as' => 'admin.',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'impersonate' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'impersonate/take/{id}/{guardName?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => '\\Lab404\\Impersonate\\Controllers\\ImpersonateController@take',
        'controller' => '\\Lab404\\Impersonate\\Controllers\\ImpersonateController@take',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'impersonate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'impersonate.leave' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'impersonate/leave',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => '\\Lab404\\Impersonate\\Controllers\\ImpersonateController@leave',
        'controller' => '\\Lab404\\Impersonate\\Controllers\\ImpersonateController@leave',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'impersonate.leave',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MO6XIBm9ylscncvB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/cms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000011b50000000000000000";}}',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::MO6XIBm9ylscncvB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.page.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cms/page',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\PageController@index',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\PageController@index',
        'as' => 'admin.cms.page.index',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/page',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:377:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:178:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Pages\'), \\route("{$role}.cms.page.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011b10000000000000000";}";s:4:"hash";s:44:"5w2P/dSWnTwB3+isZVAMuuCh7naSwmrXid6/fkE2R8k=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.page.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cms/page/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\PageController@create',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\PageController@create',
        'as' => 'admin.cms.page.create',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/page',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:389:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:190:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.cms.page.index")->push(\\__(\'Create Page\'), \\route("{$role}.cms.page.create"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011b10000000000000000";}";s:4:"hash";s:44:"Xr+p719d8T3MP2SMn7CIX9f7QBn4buaRd2lgT40pc3I=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.page.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/cms/page/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\PageController@store',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\PageController@store',
        'as' => 'admin.cms.page.store',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/page',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.page.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cms/page/{page}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\PageController@edit',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\PageController@edit',
        'as' => 'admin.cms.page.edit',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/page/{page}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:441:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:242:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $page) use ($role) {
                    $trail->parent("{$role}.cms.page.index")->push(\\__(\'Editing :page\', [\'page\' => $page->title]), \\route("{$role}.cms.page.edit", $page->id));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011ae0000000000000000";}";s:4:"hash";s:44:"AxVVTpBWqptXDW7Il205eT9QJmIQ4OTPWX5qbb1cR4w=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.page.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/cms/page/{page}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\PageController@update',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\PageController@update',
        'as' => 'admin.cms.page.update',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/page/{page}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.page.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/cms/page/{page}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\PageController@destroy',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\PageController@destroy',
        'as' => 'admin.cms.page.destroy',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/page/{page}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.emailTemplate.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cms/email-template',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@index',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@index',
        'as' => 'admin.cms.emailTemplate.index',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/email-template',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:396:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:197:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Email Templates\'), \\route("{$role}.cms.emailTemplate.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011ab0000000000000000";}";s:4:"hash";s:44:"u67voWwHeYxaM30LUcqIjyDTk9jONnFOcZ3usCQzjwI=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.emailTemplate.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cms/email-template/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@create',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@create',
        'as' => 'admin.cms.emailTemplate.create',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/email-template',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:417:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:218:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.cms.emailTemplate.index")->push(\\__(\'Create Email Template\'), \\route("{$role}.cms.emailTemplate.create"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011ab0000000000000000";}";s:4:"hash";s:44:"wUe8i5B5UjPVKuAnRMFu4x31p1tMW61BVKmlhUzRhTo=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.emailTemplate.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/cms/email-template/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@store',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@store',
        'as' => 'admin.cms.emailTemplate.store',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/email-template',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.emailTemplate.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cms/email-template/{emailTemplate}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@edit',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@edit',
        'as' => 'admin.cms.emailTemplate.edit',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/email-template/{emailTemplate}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:604:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:405:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $emailTemplateId) use ($role) {
                    $email_template = \\Modules\\Cms\\Entities\\EmailTemplate::find($emailTemplateId);
                    $trail->parent("{$role}.cms.emailTemplate.index")->push(\\__(\'Editing :emailTemplate\', [\'emailTemplate\' => $email_template->title]), \\route("{$role}.cms.emailTemplate.edit", $emailTemplateId));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011a90000000000000000";}";s:4:"hash";s:44:"i2JAx4jrHn+EPr5wtJ1+WpGhgpgmpBsEYYWtp7BLqfY=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.emailTemplate.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/cms/email-template/{emailTemplate}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@update',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@update',
        'as' => 'admin.cms.emailTemplate.update',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/email-template/{emailTemplate}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.emailTemplate.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/cms/email-template/{emailTemplate}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@destroy',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@destroy',
        'as' => 'admin.cms.emailTemplate.destroy',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/email-template/{emailTemplate}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.announcement.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cms/announcement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@index',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@index',
        'as' => 'admin.cms.announcement.index',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/announcement',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:392:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:193:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Announcement\'), \\route("{$role}.cms.announcement.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011a50000000000000000";}";s:4:"hash";s:44:"j+kamIuteGIVwXCW4vYuAPs8CQqddY8ELQcuxG7uGr0=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.announcement.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cms/announcement/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@create',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@create',
        'as' => 'admin.cms.announcement.create',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/announcement',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:413:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:214:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.cms.announcement.index")->push(\\__(\'Create Announcement\'), \\route("{$role}.cms.announcement.create"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011a50000000000000000";}";s:4:"hash";s:44:"FXRIVy39lTvzGkZninHWUx3KEM5t6ZsBb8H31u6LyNg=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.announcement.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/cms/announcement/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@store',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@store',
        'as' => 'admin.cms.announcement.store',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/announcement',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.announcement.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cms/announcement/{page}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@edit',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@edit',
        'as' => 'admin.cms.announcement.edit',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/announcement/{page}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:465:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:266:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $page) use ($role) {
                    $trail->parent("{$role}.cms.announcement.index")->push(\\__(\'Editing :announcement\', [\'announcement\' => $page->title]), \\route("{$role}.cms.page.edit", $page->id));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011a30000000000000000";}";s:4:"hash";s:44:"0h7Ej3QWEcS9PD1GlJ/cEqinK1pF7UARdZov1RpWyw8=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.announcement.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/cms/announcement/{page}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@update',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@update',
        'as' => 'admin.cms.announcement.update',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/announcement/{page}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.cms.announcement.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/cms/announcement/{page}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@destroy',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@destroy',
        'as' => 'admin.cms.announcement.destroy',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'admin/cms/announcement/{page}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.page.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/cms/page',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\PageController@index',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\PageController@index',
        'as' => 'manager.cms.page.index',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/page',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:377:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:178:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Pages\'), \\route("{$role}.cms.page.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000119f0000000000000000";}";s:4:"hash";s:44:"Ho4529/s09Xok5xB3IZV+0SUb1sFy2dviPX46g8j4As=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.page.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/cms/page/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\PageController@create',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\PageController@create',
        'as' => 'manager.cms.page.create',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/page',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:389:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:190:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.cms.page.index")->push(\\__(\'Create Page\'), \\route("{$role}.cms.page.create"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000119f0000000000000000";}";s:4:"hash";s:44:"hFWt7wv98vYQ9UMBYxD7R6kVOS62l19Tl7ceEGch3aE=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.page.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/cms/page/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\PageController@store',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\PageController@store',
        'as' => 'manager.cms.page.store',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/page',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.page.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/cms/page/{page}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\PageController@edit',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\PageController@edit',
        'as' => 'manager.cms.page.edit',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/page/{page}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:441:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:242:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $page) use ($role) {
                    $trail->parent("{$role}.cms.page.index")->push(\\__(\'Editing :page\', [\'page\' => $page->title]), \\route("{$role}.cms.page.edit", $page->id));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000119d0000000000000000";}";s:4:"hash";s:44:"+zAY5bqDcRmvIl1NM1RpGK2MAoptj3MsOtd6US5qSMI=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.page.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'manager/cms/page/{page}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\PageController@update',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\PageController@update',
        'as' => 'manager.cms.page.update',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/page/{page}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.page.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'manager/cms/page/{page}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\PageController@destroy',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\PageController@destroy',
        'as' => 'manager.cms.page.destroy',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/page/{page}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.emailTemplate.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/cms/email-template',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@index',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@index',
        'as' => 'manager.cms.emailTemplate.index',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/email-template',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:396:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:197:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Email Templates\'), \\route("{$role}.cms.emailTemplate.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011990000000000000000";}";s:4:"hash";s:44:"c4FSwsXo6K14aHeveHhw6k1lcz8JqF0kAx4a6z50Th0=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.emailTemplate.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/cms/email-template/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@create',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@create',
        'as' => 'manager.cms.emailTemplate.create',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/email-template',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:417:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:218:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.cms.emailTemplate.index")->push(\\__(\'Create Email Template\'), \\route("{$role}.cms.emailTemplate.create"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011990000000000000000";}";s:4:"hash";s:44:"IaWif5nPuYw75BaAO7MVXfKEcokG5zx+ns9/ClHbHio=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.emailTemplate.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/cms/email-template/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@store',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@store',
        'as' => 'manager.cms.emailTemplate.store',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/email-template',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.emailTemplate.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/cms/email-template/{emailTemplate}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@edit',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@edit',
        'as' => 'manager.cms.emailTemplate.edit',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/email-template/{emailTemplate}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:604:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:405:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $emailTemplateId) use ($role) {
                    $email_template = \\Modules\\Cms\\Entities\\EmailTemplate::find($emailTemplateId);
                    $trail->parent("{$role}.cms.emailTemplate.index")->push(\\__(\'Editing :emailTemplate\', [\'emailTemplate\' => $email_template->title]), \\route("{$role}.cms.emailTemplate.edit", $emailTemplateId));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011970000000000000000";}";s:4:"hash";s:44:"pQ+J2mYBHuRzK5FRgEuQsVebrjya8ZfYSGdq6alxZxk=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.emailTemplate.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'manager/cms/email-template/{emailTemplate}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@update',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@update',
        'as' => 'manager.cms.emailTemplate.update',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/email-template/{emailTemplate}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.emailTemplate.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'manager/cms/email-template/{emailTemplate}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@destroy',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\EmailTemplateController@destroy',
        'as' => 'manager.cms.emailTemplate.destroy',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/email-template/{emailTemplate}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.announcement.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/cms/announcement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@index',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@index',
        'as' => 'manager.cms.announcement.index',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/announcement',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:392:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:193:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Announcement\'), \\route("{$role}.cms.announcement.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011930000000000000000";}";s:4:"hash";s:44:"oYW26D05leUFUBL+ebheylEmz1Oy7hAKYTdHz21p+DY=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.announcement.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/cms/announcement/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@create',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@create',
        'as' => 'manager.cms.announcement.create',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/announcement',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:413:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:214:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.cms.announcement.index")->push(\\__(\'Create Announcement\'), \\route("{$role}.cms.announcement.create"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011930000000000000000";}";s:4:"hash";s:44:"BjMeCtNdOGZepbS31eltmFmi5RGgbW2PaBl9YuSC2vo=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.announcement.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/cms/announcement/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@store',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@store',
        'as' => 'manager.cms.announcement.store',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/announcement',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.announcement.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/cms/announcement/{page}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@edit',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@edit',
        'as' => 'manager.cms.announcement.edit',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/announcement/{page}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:465:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:266:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $page) use ($role) {
                    $trail->parent("{$role}.cms.announcement.index")->push(\\__(\'Editing :announcement\', [\'announcement\' => $page->title]), \\route("{$role}.cms.page.edit", $page->id));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011910000000000000000";}";s:4:"hash";s:44:"ILLFLkNyhbORgFe34gBI5705UFVIKOcb6r+yRxGlwZ8=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.announcement.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'manager/cms/announcement/{page}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@update',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@update',
        'as' => 'manager.cms.announcement.update',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/announcement/{page}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.cms.announcement.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'manager/cms/announcement/{page}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@destroy',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\AnnouncementController@destroy',
        'as' => 'manager.cms.announcement.destroy',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => 'manager/cms/announcement/{page}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cms.page.single' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'cms/page/{page}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Cms\\Http\\Controllers\\PageController@singlePage',
        'controller' => 'Modules\\Cms\\Http\\Controllers\\PageController@singlePage',
        'as' => 'cms.page.single',
        'namespace' => 'Modules\\Cms\\Http\\Controllers',
        'prefix' => '/cms',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:500:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:281:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $pageSlug) {
            $page = \\Modules\\Cms\\Entities\\Page::where(\'slug\', $pageSlug)->first();
            $trail->parent(\'frontend.index\')->push(\\__(\':page\', [\'page\' => $page->title]), \\route(\'cms.page.single\', $page->slug));
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000011bf0000000000000000";}";s:4:"hash";s:44:"KcNi+ZCW1EL1n8XZ2EH9/xzCjKRz15FYu2dpzjcKB/c=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZCRb8vLPsXlZOd8d' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/formbuilder',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000011880000000000000000";}}',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ZCRb8vLPsXlZOd8d',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'PATCH',
        5 => 'DELETE',
        6 => 'OPTIONS',
      ),
      'uri' => 'admin/form-builder',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => '\\Illuminate\\Routing\\RedirectController@__invoke',
        'controller' => '\\Illuminate\\Routing\\RedirectController',
        'as' => 'formbuilder::',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'destination' => 'http://localhost/admin/form-builder/forms',
        'status' => 302,
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::form.render' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/form-builder/form/{identifier}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\RenderFormController@render',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\RenderFormController@render',
        'as' => 'formbuilder::form.render',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::form.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/form-builder/form/{identifier}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\RenderFormController@submit',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\RenderFormController@submit',
        'as' => 'formbuilder::form.submit',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::form.feedback' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/form-builder/form/{identifier}/feedback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\RenderFormController@feedback',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\RenderFormController@feedback',
        'as' => 'formbuilder::form.feedback',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::my-submissions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/form-builder/my-submissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::my-submissions.index',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\MySubmissionController@index',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\MySubmissionController@index',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::my-submissions.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/form-builder/my-submissions/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::my-submissions.create',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\MySubmissionController@create',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\MySubmissionController@create',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::my-submissions.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/form-builder/my-submissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::my-submissions.store',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\MySubmissionController@store',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\MySubmissionController@store',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::my-submissions.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/form-builder/my-submissions/{my_submission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::my-submissions.show',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\MySubmissionController@show',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\MySubmissionController@show',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::my-submissions.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/form-builder/my-submissions/{my_submission}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::my-submissions.edit',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\MySubmissionController@edit',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\MySubmissionController@edit',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::my-submissions.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/form-builder/my-submissions/{my_submission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::my-submissions.update',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\MySubmissionController@update',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\MySubmissionController@update',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::my-submissions.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/form-builder/my-submissions/{my_submission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::my-submissions.destroy',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\MySubmissionController@destroy',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\MySubmissionController@destroy',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::forms.submissions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/form-builder/forms/{fid}/submissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::forms.submissions.index',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\SubmissionController@index',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\SubmissionController@index',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/forms/{fid}/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::forms.submissions.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/form-builder/forms/{fid}/submissions/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::forms.submissions.create',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\SubmissionController@create',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\SubmissionController@create',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/forms/{fid}/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::forms.submissions.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/form-builder/forms/{fid}/submissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::forms.submissions.store',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\SubmissionController@store',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\SubmissionController@store',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/forms/{fid}/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::forms.submissions.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/form-builder/forms/{fid}/submissions/{submission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::forms.submissions.show',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\SubmissionController@show',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\SubmissionController@show',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/forms/{fid}/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::forms.submissions.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/form-builder/forms/{fid}/submissions/{submission}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::forms.submissions.edit',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\SubmissionController@edit',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\SubmissionController@edit',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/forms/{fid}/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::forms.submissions.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/form-builder/forms/{fid}/submissions/{submission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::forms.submissions.update',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\SubmissionController@update',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\SubmissionController@update',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/forms/{fid}/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::forms.submissions.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/form-builder/forms/{fid}/submissions/{submission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::forms.submissions.destroy',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\SubmissionController@destroy',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\SubmissionController@destroy',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/forms/{fid}/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::forms.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/form-builder/forms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::forms.index',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\FormController@index',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\FormController@index',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::forms.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/form-builder/forms/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::forms.create',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\FormController@create',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\FormController@create',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::forms.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/form-builder/forms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::forms.store',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\FormController@store',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\FormController@store',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::forms.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/form-builder/forms/{form}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::forms.show',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\FormController@show',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\FormController@show',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::forms.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/form-builder/forms/{form}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::forms.edit',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\FormController@edit',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\FormController@edit',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::forms.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/form-builder/forms/{form}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::forms.update',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\FormController@update',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\FormController@update',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'formbuilder::forms.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/form-builder/forms/{form}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'as' => 'formbuilder::forms.destroy',
        'uses' => 'Modules\\FormBuilder\\Http\\Controllers\\FormController@destroy',
        'controller' => 'Modules\\FormBuilder\\Http\\Controllers\\FormController@destroy',
        'namespace' => 'Modules\\FormBuilder\\Http\\Controllers',
        'prefix' => 'admin/form-builder/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::umP2ezkHSFHP808A' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/leads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000011670000000000000000";}}',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::umP2ezkHSFHP808A',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.pma.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/pma',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@index',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@index',
        'as' => 'admin.pma.index',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'admin/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:370:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:171:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'PMA\'), \\route("{$role}.pma.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011630000000000000000";}";s:4:"hash";s:44:"XIbz8Rz6OMCaw5TbIhuFkjDV79rzh+fVRafsxWo07pM=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.pma.sendPMA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/pma/send-pma',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@sendPMA',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@sendPMA',
        'as' => 'admin.pma.sendPMA',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'admin/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:377:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:178:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Send PMA\'), \\route("{$role}.pma.sendPMA"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011630000000000000000";}";s:4:"hash";s:44:"wBm2ugzFv3xPrSuL7nUT8FvfjAnwm73aookGgk5Ppcs=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.pma.addFormManually' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/pma/add-pma-manually',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@addFormManually',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@addFormManually',
        'as' => 'admin.pma.addFormManually',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'admin/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:384:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:185:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Add PMA\'), \\route("{$role}.pma.addFormManually"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011630000000000000000";}";s:4:"hash";s:44:"fKDNIqki+ghpIRY/uwAeoOhpvHltd2R7WE1X7cQTmHU=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.pma.rentalRvaluation' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/pma/rental-evaluation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@index',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@index',
        'as' => 'admin.pma.rentalRvaluation',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'admin/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:385:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:186:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Add PMA\'), \\route("{$role}.pma.rentalRvaluation"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011630000000000000000";}";s:4:"hash";s:44:"gqK/jSneEBKHgLqVJ53ghhLbPwqlM8XUK6xr2rz/BJs=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.pma.pma-pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/pma/pma-pdf/{agreementId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pdfFile',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pdfFile',
        'as' => 'admin.pma.pma-pdf',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'admin/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.pma.editFormManually' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/pma/edit-pma-manually/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@editFormManually',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@editFormManually',
        'as' => 'admin.pma.editFormManually',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'admin/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.pma.sendPMAForm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/pma/send-pma-form',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@sendPMAForm',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@sendPMAForm',
        'as' => 'admin.pma.sendPMAForm',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'admin/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rental_evaluation.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rental-evaluation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@index',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@index',
        'as' => 'admin.rental_evaluation.index',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'admin/rental-evaluation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:398:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:199:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Rental Evaluation\'), \\route("{$role}.rental_evaluation.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000115d0000000000000000";}";s:4:"hash";s:44:"6vIHEQFdIwcNpd5istO+rDJVoj01/KUCHjIRzlQ/ykU=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rental_evaluation.evaluationForm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/rental-evaluation/evaluation-form/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@evaluationForm',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@evaluationForm',
        'as' => 'admin.rental_evaluation.evaluationForm',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'admin/rental-evaluation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:416:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:217:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Property Rental Evaluation\'), \\route("{$role}.rental_evaluation.evaluationForm"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000115d0000000000000000";}";s:4:"hash";s:44:"Igo4eU/k7e+XKj7lxp0zEWWt1jTtv8O93zNrugEwjiE=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.pma.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/pma',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@index',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@index',
        'as' => 'manager.pma.index',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'manager/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:372:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:171:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'PMA\'), \\route("{$role}.pma.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000115f0000000000000000";}";s:4:"hash";s:44:"DqXoM60IgkVPbNIT/OWAqPVJLW+Otvy6IBT7QhLupQo=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.pma.sendPMA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/pma/send-pma',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@sendPMA',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@sendPMA',
        'as' => 'manager.pma.sendPMA',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'manager/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:379:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:178:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Send PMA\'), \\route("{$role}.pma.sendPMA"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000115f0000000000000000";}";s:4:"hash";s:44:"40Kzok+JcdpCBCchy2l0c8i1nfuU2h/KGIg7J+L2TYY=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.pma.addFormManually' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'manager/pma/add-pma-manually',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@addFormManually',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@addFormManually',
        'as' => 'manager.pma.addFormManually',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'manager/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:386:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:185:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Add PMA\'), \\route("{$role}.pma.addFormManually"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000115f0000000000000000";}";s:4:"hash";s:44:"6CwIEoRhYjLZlHhcpTbrO1uOWe6ThGAeDOfPDVrT2Mg=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.pma.rentalRvaluation' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/pma/rental-evaluation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@index',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@index',
        'as' => 'manager.pma.rentalRvaluation',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'manager/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:387:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:186:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Add PMA\'), \\route("{$role}.pma.rentalRvaluation"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000115f0000000000000000";}";s:4:"hash";s:44:"U3/BvL+XlowmWGi4pqxXGz2vH+68q8LZEulfBkw+Hdw=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.pma.pma-pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/pma/pma-pdf/{agreementId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pdfFile',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pdfFile',
        'as' => 'manager.pma.pma-pdf',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'manager/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.pma.editFormManually' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/pma/edit-pma-manually/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@editFormManually',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@editFormManually',
        'as' => 'manager.pma.editFormManually',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'manager/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.pma.sendPMAForm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/pma/send-pma-form',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@sendPMAForm',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@sendPMAForm',
        'as' => 'manager.pma.sendPMAForm',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'manager/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.rental_evaluation.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/rental-evaluation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@index',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@index',
        'as' => 'manager.rental_evaluation.index',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'manager/rental-evaluation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:400:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:199:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Rental Evaluation\'), \\route("{$role}.rental_evaluation.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011540000000000000000";}";s:4:"hash";s:44:"q/kRRwrLBee3U6h/7ArBqID2y8s3mluCjuDFOCiLU9M=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.rental_evaluation.evaluationForm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'manager/rental-evaluation/evaluation-form/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@evaluationForm',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@evaluationForm',
        'as' => 'manager.rental_evaluation.evaluationForm',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'manager/rental-evaluation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:418:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:217:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Property Rental Evaluation\'), \\route("{$role}.rental_evaluation.evaluationForm"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011540000000000000000";}";s:4:"hash";s:44:"VYnA6YJu9soaHvsT7ahapH80pHa+suLvJZUfluSRd4Y=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.pma.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/pma',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@index',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@index',
        'as' => 'owner.pma.index',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'owner/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:370:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:171:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'PMA\'), \\route("{$role}.pma.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011560000000000000000";}";s:4:"hash";s:44:"hLa5Hz1CFplhX+h8/s/HgXamPQcQJKlZBh/oFYo+uJI=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.pma.sendPMA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/pma/send-pma',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@sendPMA',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@sendPMA',
        'as' => 'owner.pma.sendPMA',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'owner/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:377:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:178:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Send PMA\'), \\route("{$role}.pma.sendPMA"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011560000000000000000";}";s:4:"hash";s:44:"BRuThaFICVQXyes/+J+sCzmRZONQRp9YemcU5AxVlzU=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.pma.addFormManually' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'owner/pma/add-pma-manually',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@addFormManually',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@addFormManually',
        'as' => 'owner.pma.addFormManually',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'owner/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:384:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:185:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Add PMA\'), \\route("{$role}.pma.addFormManually"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011560000000000000000";}";s:4:"hash";s:44:"fqko8+OMg8sWjAImDMjQzCmKYqGKuDa2ltMOlMpeL9E=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.pma.rentalRvaluation' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/pma/rental-evaluation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@index',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@index',
        'as' => 'owner.pma.rentalRvaluation',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'owner/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:385:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:186:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Add PMA\'), \\route("{$role}.pma.rentalRvaluation"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011560000000000000000";}";s:4:"hash";s:44:"tTA7SqOhbWCMzeADC0dI/NV6DmVSDUI8UO+8N/RapXI=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.pma.pma-pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/pma/pma-pdf/{agreementId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pdfFile',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pdfFile',
        'as' => 'owner.pma.pma-pdf',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'owner/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.pma.editFormManually' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/pma/edit-pma-manually/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@editFormManually',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@editFormManually',
        'as' => 'owner.pma.editFormManually',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'owner/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.pma.sendPMAForm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'owner/pma/send-pma-form',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@sendPMAForm',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@sendPMAForm',
        'as' => 'owner.pma.sendPMAForm',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'owner/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.rental_evaluation.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/rental-evaluation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@index',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@index',
        'as' => 'owner.rental_evaluation.index',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'owner/rental-evaluation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:398:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:199:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Rental Evaluation\'), \\route("{$role}.rental_evaluation.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000114b0000000000000000";}";s:4:"hash";s:44:"S6FlCoNVWT/0+7+EA3AG6QYSAw5BLDfndXPBoJuVyRk=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.rental_evaluation.evaluationForm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'owner/rental-evaluation/evaluation-form/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@evaluationForm',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@evaluationForm',
        'as' => 'owner.rental_evaluation.evaluationForm',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'owner/rental-evaluation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:416:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:217:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Property Rental Evaluation\'), \\route("{$role}.rental_evaluation.evaluationForm"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000114b0000000000000000";}";s:4:"hash";s:44:"pSk4n74LmGJQYdQzZ6RD4pNrXIVu2klQZ0b0PNtejzU=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.pma.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/pma',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@index',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@index',
        'as' => 'agent.pma.index',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'agent/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:370:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:171:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'PMA\'), \\route("{$role}.pma.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000114d0000000000000000";}";s:4:"hash";s:44:"WLZlNWig+1jG/wxSwWgCJ258EHmxsrW3dMU0voI8qXQ=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.pma.sendPMA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/pma/send-pma',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@sendPMA',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@sendPMA',
        'as' => 'agent.pma.sendPMA',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'agent/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:377:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:178:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Send PMA\'), \\route("{$role}.pma.sendPMA"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000114d0000000000000000";}";s:4:"hash";s:44:"TXYTGFOeKkcw1bjrc8R5k9VCmpIffW9W/TMXstsyZyM=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.pma.addFormManually' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'agent/pma/add-pma-manually',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@addFormManually',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@addFormManually',
        'as' => 'agent.pma.addFormManually',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'agent/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:384:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:185:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Add PMA\'), \\route("{$role}.pma.addFormManually"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000114d0000000000000000";}";s:4:"hash";s:44:"9Z839nwHkNiCc/yL5HFeTlWiXt630NtpV7MpqwuWvwg=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.pma.rentalRvaluation' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/pma/rental-evaluation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@index',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@index',
        'as' => 'agent.pma.rentalRvaluation',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'agent/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:385:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:186:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Add PMA\'), \\route("{$role}.pma.rentalRvaluation"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000114d0000000000000000";}";s:4:"hash";s:44:"/rNg9RFwBED9KppjpN/Lxy7qvkeKzYRlvemHdW86j1g=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.pma.pma-pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/pma/pma-pdf/{agreementId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pdfFile',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pdfFile',
        'as' => 'agent.pma.pma-pdf',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'agent/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.pma.editFormManually' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/pma/edit-pma-manually/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@editFormManually',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@editFormManually',
        'as' => 'agent.pma.editFormManually',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'agent/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.pma.sendPMAForm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agent/pma/send-pma-form',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@sendPMAForm',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@sendPMAForm',
        'as' => 'agent.pma.sendPMAForm',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'agent/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.rental_evaluation.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/rental-evaluation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@index',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@index',
        'as' => 'agent.rental_evaluation.index',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'agent/rental-evaluation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:398:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:199:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Rental Evaluation\'), \\route("{$role}.rental_evaluation.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011420000000000000000";}";s:4:"hash";s:44:"99cE4qyY2gyrIu9l+O8n7ZTeX6E3bXPuxwvpWOhffUY=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.rental_evaluation.evaluationForm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'agent/rental-evaluation/evaluation-form/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@evaluationForm',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\RentalEvaluationController@evaluationForm',
        'as' => 'agent.rental_evaluation.evaluationForm',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => 'agent/rental-evaluation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:416:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:217:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Property Rental Evaluation\'), \\route("{$role}.rental_evaluation.evaluationForm"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011420000000000000000";}";s:4:"hash";s:44:"wl+0ZMQ94tg+/Urhqv3w6wWVk4bSK1vxdw9w5cYuyqc=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pma.propertyInfo' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'pma/property-info/{account_id}/{user_id}/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@propertyInfo',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@propertyInfo',
        'as' => 'pma.propertyInfo',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => '/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:489:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:270:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $account_id, $user_id, $id) {
            $trail->parent(\'frontend.index\')->push(\\__(\'Property Management Application\'), \\route(\'pma.propertyInfo\', [\'account_id\' => $account_id, \'user_id\' => $user_id, \'id\' => $id]));
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000011400000000000000000";}";s:4:"hash";s:44:"MEnsw/GZny611Y4ZOO4AwNclR72ahAXFYD2zQu6cwx8=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pma.pmaRegisterForm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pma/register/{account_id}/{userId?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pmaRegisterForm',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pmaRegisterForm',
        'as' => 'pma.pmaRegisterForm',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => '/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pma.pmaRegisterFormSubmit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'pma/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pmaRegisterFormSubmit',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pmaRegisterFormSubmit',
        'as' => 'pma.pmaRegisterFormSubmit',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => '/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pma.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'pma/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@store',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@store',
        'as' => 'pma.store',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => '/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pma.form' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pma/form/{account_id}/{owners?}/{ap?}/{email2?}/{formId?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pmaForm',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pmaForm',
        'as' => 'pma.form',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => '/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pma.agentForm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pma/agent-form/{account_id}/{formId?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pmaForm',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pmaForm',
        'as' => 'pma.agentForm',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => '/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pma.viewForm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pma/view-form/{action?}/{form_id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pmaViewForm',
        'controller' => 'Modules\\Leads\\Http\\Controllers\\LeadsController@pmaViewForm',
        'as' => 'pma.viewForm',
        'namespace' => 'Modules\\Leads\\Http\\Controllers',
        'prefix' => '/pma',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gfpDMymo5oR9wN3d' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/property',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000011340000000000000000";}}',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::gfpDMymo5oR9wN3d',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@index',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@index',
        'as' => 'admin.properties.index',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:384:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:185:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Properties\'), \\route("{$role}.properties.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000113a0000000000000000";}";s:4:"hash";s:44:"3kSlqvw7udQ7bhDn6uCx8m3B+5qMrIQM8gWMPSUN5Qk=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/properties/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@create',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@create',
        'as' => 'admin.properties.create',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:397:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:198:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.properties.index")->push(\\__(\'Create Property\'), \\route("{$role}.properties.create"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000113a0000000000000000";}";s:4:"hash";s:44:"zJXzYeYghX+FHSi2lG6I5PlGk5ZNKXef4YWaN6eumDo=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@store',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@store',
        'as' => 'admin.properties.store',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.performanceReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/properties/performance-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@performanceReport',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@performanceReport',
        'as' => 'admin.properties.performanceReport',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:404:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:205:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Performance Report\'), \\route("{$role}.properties.performanceReport"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000112f0000000000000000";}";s:4:"hash";s:44:"WJxJx+B1aGZjia4xw1JmXC9ugXp0/WfC3XlP/bEkjWw=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.sentPerformanceReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/properties/sent-performance-report/{pId?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@sentPerformanceReport',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@sentPerformanceReport',
        'as' => 'admin.properties.sentPerformanceReport',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:420:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:221:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.properties.performanceReport")->push(\\__(\'Sent Report\'), \\route("{$role}.properties.sentPerformanceReport"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000112f0000000000000000";}";s:4:"hash";s:44:"szlSEJ4mk8capOIPmPERVyQ73eoMq2ktLtwobYMp4KA=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.sendPerformanceReport' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/properties/send-performance-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@sendPerformanceReport',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@sendPerformanceReport',
        'as' => 'admin.properties.sendPerformanceReport',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/properties/{property}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@edit',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@edit',
        'as' => 'admin.properties.edit',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/properties/{property}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:457:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:258:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $property) use ($role) {
                    $trail->parent("{$role}.properties.index")->push(\\__(\':property\', [\'property\' => $property->title]), \\route("{$role}.properties.edit", $property->id));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000112d0000000000000000";}";s:4:"hash";s:44:"ucRgb4T3oHsAbON0DIrqnUeuSa8UfU1KePEcIPWA6tQ=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/properties/{property}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@update',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@update',
        'as' => 'admin.properties.update',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/properties/{property}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/properties/{property}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@destroy',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@destroy',
        'as' => 'admin.properties.destroy',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/properties/{property}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.makeFeatured' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/properties/{property}/make-featured',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@makeFeatured',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@makeFeatured',
        'as' => 'admin.properties.makeFeatured',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/properties/{property}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.properties.removePropertyMedia' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/properties/delete-property-media/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@removePropertyMedia',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@removePropertyMedia',
        'as' => 'admin.properties.removePropertyMedia',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.buildings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/buildings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@index',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@index',
        'as' => 'admin.buildings.index',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:382:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:183:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Buildings\'), \\route("{$role}.buildings.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011270000000000000000";}";s:4:"hash";s:44:"bBtn4q5ILiCsoq1hU2wuP8QzwYS0/eZq8Qj6uNfxJwA=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.buildings.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/buildings/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@create',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@create',
        'as' => 'admin.buildings.create',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:395:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:196:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.buildings.index")->push(\\__(\'Create Building\'), \\route("{$role}.buildings.create"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011270000000000000000";}";s:4:"hash";s:44:"ESm167TAHeD1Y3Vl4aiKhLgpt9lfvxRYxGC/hLP9OaQ=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.buildings.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/buildings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@store',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@store',
        'as' => 'admin.buildings.store',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.buildings.requestBuilding' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/buildings/request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@store',
        'controller' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@store',
        'as' => 'admin.buildings.requestBuilding',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.buildings.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/buildings/request-building',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@index',
        'controller' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@index',
        'as' => 'admin.buildings.request',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.buildings.request.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/buildings/request-building/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@edit',
        'controller' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@edit',
        'as' => 'admin.buildings.request.edit',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.buildings.request.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/buildings/request-building/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@update',
        'controller' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@update',
        'as' => 'admin.buildings.request.update',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.buildings.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/buildings/{building}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@edit',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@edit',
        'as' => 'admin.buildings.edit',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/buildings/{building}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:541:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:342:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $building) use ($role) {
                    $building = \\Modules\\Property\\Entities\\Building::find($building);
                    $trail->parent("{$role}.buildings.index")->push(\\__(\':building\', [\'building\' => $building->title]), \\route("{$role}.buildings.edit", $building->id));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000111f0000000000000000";}";s:4:"hash";s:44:"t5cefKoFOERoCJc1CUFeGrW0zKXdT0H1vygDV3tAAHQ=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.buildings.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/buildings/{building}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@update',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@update',
        'as' => 'admin.buildings.update',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/buildings/{building}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.buildings.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/buildings/{building}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@destroy',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@destroy',
        'as' => 'admin.buildings.destroy',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/buildings/{building}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.buildings.removeBuildingMedia' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/buildings/delete-building-media/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@removeBuildingMedia',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@removeBuildingMedia',
        'as' => 'admin.buildings.removeBuildingMedia',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/showings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@index',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@index',
        'as' => 'admin.showings.index',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:380:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:181:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Showings\'), \\route("{$role}.showings.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000111c0000000000000000";}";s:4:"hash";s:44:"GC91rU+E6usfohSzRJ5wiIyKMAcgiBngsOqNjYsne4c=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showings.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/showings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@store',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@store',
        'as' => 'admin.showings.store',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showings.scheduled' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/showings/scheduled',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduledShowings',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduledShowings',
        'as' => 'admin.showings.scheduled',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:394:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:195:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Scheduled Showings\'), \\route("{$role}.showings.scheduled"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011190000000000000000";}";s:4:"hash";s:44:"oNDb+cZBXLGMuoqQug3O4/R4wlKg6ilcGVf2Ouw3rXE=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showings.scheduledEdit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/showings/scheduled/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@updateScheduledShowings',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@updateScheduledShowings',
        'as' => 'admin.showings.scheduledEdit',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:403:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:204:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Scheduled Showings Edit\'), \\route("{$role}.showings.scheduledEdit"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011190000000000000000";}";s:4:"hash";s:44:"RbAY3REJzUFmxvqbIm2hGOSvTvLCktG1WS6ikJ3FDOU=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showings.requests' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/showings/requests/{showingId?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@showingRequest',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@showingRequest',
        'as' => 'admin.showings.requests',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:391:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:192:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Showings Request\'), \\route("{$role}.showings.requests"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011190000000000000000";}";s:4:"hash";s:44:"tppfRG8+6bTR0sRmItum5BXjJmUBQLZOD2CmLm37a58=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showings.requestsStatus' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/showings/requests/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@showingRequestStatus',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@showingRequestStatus',
        'as' => 'admin.showings.requestsStatus',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:404:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:205:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Showings Request Status\'), \\route("{$role}.showings.requestsStatus"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011190000000000000000";}";s:4:"hash";s:44:"W3KMQOa/qmu0E6NODplc17PbjcQrDzN6dPpNMK9lZtQ=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showings.questions' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/showings/questions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@askedQuestions',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@askedQuestions',
        'as' => 'admin.showings.questions',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:391:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:192:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Asked Questions\'), \\route("{$role}.showings.questions"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011190000000000000000";}";s:4:"hash";s:44:"qJBznJj23QhmgIeqOluLUoNhR57u3DeJrsegxPvcOrs=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showings.scheduleMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/showings/schedule-multiple',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduleMultiple',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduleMultiple',
        'as' => 'admin.showings.scheduleMultiple',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:400:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:201:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Multiple Schedule\'), \\route("{$role}.showings.scheduleMultiple"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011190000000000000000";}";s:4:"hash";s:44:"z/k44Q7un9lJOYf65hW27o3Qf6AtDR0QmjAEV5iepR0=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showings.getQuestion' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/showings/get-question/{question}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@getQuestion',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@getQuestion',
        'as' => 'admin.showings.getQuestion',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.showings.answerQuestion' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/showings/answer-question',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@answerQuestion',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@answerQuestion',
        'as' => 'admin.showings.answerQuestion',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'admin/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.properties.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@index',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@index',
        'as' => 'manager.properties.index',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:386:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:185:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Properties\'), \\route("{$role}.properties.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011110000000000000000";}";s:4:"hash";s:44:"PrD1lU5GsfbxbnuVb8o3WUPRli2HYr1YHHP4s1VArSM=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.properties.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/properties/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@create',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@create',
        'as' => 'manager.properties.create',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:399:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:198:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.properties.index")->push(\\__(\'Create Property\'), \\route("{$role}.properties.create"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011110000000000000000";}";s:4:"hash";s:44:"SXYxn+kJD3hdgbuUb+e46fXHcp4etYSBhJsxoMMC8+A=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.properties.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@store',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@store',
        'as' => 'manager.properties.store',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.properties.performanceReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/properties/performance-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@performanceReport',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@performanceReport',
        'as' => 'manager.properties.performanceReport',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:406:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:205:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Performance Report\'), \\route("{$role}.properties.performanceReport"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011150000000000000000";}";s:4:"hash";s:44:"zlT5mI2NeeUSZ7zsD52Bq7SoJ4irsK+1jQpxLsiswlg=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.properties.sentPerformanceReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/properties/sent-performance-report/{pId?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@sentPerformanceReport',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@sentPerformanceReport',
        'as' => 'manager.properties.sentPerformanceReport',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:422:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:221:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.properties.performanceReport")->push(\\__(\'Sent Report\'), \\route("{$role}.properties.sentPerformanceReport"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011150000000000000000";}";s:4:"hash";s:44:"a1Qiwa9P8x0IGPrhELSzR+Lk/GaVKYK462s7c1Ay93Y=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.properties.sendPerformanceReport' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/properties/send-performance-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@sendPerformanceReport',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@sendPerformanceReport',
        'as' => 'manager.properties.sendPerformanceReport',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.properties.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/properties/{property}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@edit',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@edit',
        'as' => 'manager.properties.edit',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/properties/{property}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:459:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:258:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $property) use ($role) {
                    $trail->parent("{$role}.properties.index")->push(\\__(\':property\', [\'property\' => $property->title]), \\route("{$role}.properties.edit", $property->id));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000110d0000000000000000";}";s:4:"hash";s:44:"AxSBWhmcE9AO1iosslFEo47jc5N+PTsqq478Fem3+hk=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.properties.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'manager/properties/{property}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@update',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@update',
        'as' => 'manager.properties.update',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/properties/{property}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.properties.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'manager/properties/{property}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@destroy',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@destroy',
        'as' => 'manager.properties.destroy',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/properties/{property}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.properties.makeFeatured' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/properties/{property}/make-featured',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@makeFeatured',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@makeFeatured',
        'as' => 'manager.properties.makeFeatured',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/properties/{property}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.properties.removePropertyMedia' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'manager/properties/delete-property-media/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@removePropertyMedia',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@removePropertyMedia',
        'as' => 'manager.properties.removePropertyMedia',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.buildings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/buildings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@index',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@index',
        'as' => 'manager.buildings.index',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:384:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:183:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Buildings\'), \\route("{$role}.buildings.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011070000000000000000";}";s:4:"hash";s:44:"Nc9FAAkdg2yiPgwBiKOzXa0LKyW4CTngqVa7mXT3JWE=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.buildings.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/buildings/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@create',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@create',
        'as' => 'manager.buildings.create',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:397:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:196:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.buildings.index")->push(\\__(\'Create Building\'), \\route("{$role}.buildings.create"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011070000000000000000";}";s:4:"hash";s:44:"Ork4S13imLnxSeAvuasS/IOdRZWW9IkPFdUeotZuD0M=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.buildings.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/buildings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@store',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@store',
        'as' => 'manager.buildings.store',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.buildings.requestBuilding' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/buildings/request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@store',
        'controller' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@store',
        'as' => 'manager.buildings.requestBuilding',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.buildings.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/buildings/request-building',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@index',
        'controller' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@index',
        'as' => 'manager.buildings.request',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.buildings.request.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/buildings/request-building/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@edit',
        'controller' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@edit',
        'as' => 'manager.buildings.request.edit',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.buildings.request.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'manager/buildings/request-building/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@update',
        'controller' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@update',
        'as' => 'manager.buildings.request.update',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.buildings.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/buildings/{building}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@edit',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@edit',
        'as' => 'manager.buildings.edit',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/buildings/{building}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:543:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:342:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $building) use ($role) {
                    $building = \\Modules\\Property\\Entities\\Building::find($building);
                    $trail->parent("{$role}.buildings.index")->push(\\__(\':building\', [\'building\' => $building->title]), \\route("{$role}.buildings.edit", $building->id));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010ff0000000000000000";}";s:4:"hash";s:44:"dQIcfb1U0Vpqk/1MDGt1qMJ+gqQveLWoO+VjZDIRB+U=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.buildings.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'manager/buildings/{building}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@update',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@update',
        'as' => 'manager.buildings.update',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/buildings/{building}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.buildings.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'manager/buildings/{building}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@destroy',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@destroy',
        'as' => 'manager.buildings.destroy',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/buildings/{building}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.buildings.removeBuildingMedia' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'manager/buildings/delete-building-media/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@removeBuildingMedia',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@removeBuildingMedia',
        'as' => 'manager.buildings.removeBuildingMedia',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.showings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/showings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@index',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@index',
        'as' => 'manager.showings.index',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:382:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:181:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Showings\'), \\route("{$role}.showings.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010fc0000000000000000";}";s:4:"hash";s:44:"37aVVCPt7aH5I0+7cknK5aQfxMawDyMO+roP6ZVXbSM=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.showings.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/showings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@store',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@store',
        'as' => 'manager.showings.store',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.showings.scheduled' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/showings/scheduled',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduledShowings',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduledShowings',
        'as' => 'manager.showings.scheduled',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:396:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:195:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Scheduled Showings\'), \\route("{$role}.showings.scheduled"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010f90000000000000000";}";s:4:"hash";s:44:"XrAVs56KZQeb1qIibg0kk+lHpomcwaQqbUp8BhItibo=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.showings.scheduledEdit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/showings/scheduled/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@updateScheduledShowings',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@updateScheduledShowings',
        'as' => 'manager.showings.scheduledEdit',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:405:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:204:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Scheduled Showings Edit\'), \\route("{$role}.showings.scheduledEdit"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010f90000000000000000";}";s:4:"hash";s:44:"BF7H2DJeDQXyAJl+k83cnU5zHP9pFB2pQH2kXS9rg1Q=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.showings.requests' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/showings/requests/{showingId?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@showingRequest',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@showingRequest',
        'as' => 'manager.showings.requests',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:393:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:192:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Showings Request\'), \\route("{$role}.showings.requests"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010f90000000000000000";}";s:4:"hash";s:44:"TyR59SJvKARWFwgl1qE9sxJcOquRwIPD+NifSBtMmWo=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.showings.requestsStatus' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/showings/requests/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@showingRequestStatus',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@showingRequestStatus',
        'as' => 'manager.showings.requestsStatus',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:406:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:205:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Showings Request Status\'), \\route("{$role}.showings.requestsStatus"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010f90000000000000000";}";s:4:"hash";s:44:"RCNi/AVO0gEl46T0KEyQcPH9uceW6sAe1zEzKAFAImU=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.showings.questions' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/showings/questions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@askedQuestions',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@askedQuestions',
        'as' => 'manager.showings.questions',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:393:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:192:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Asked Questions\'), \\route("{$role}.showings.questions"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010f90000000000000000";}";s:4:"hash";s:44:"Sew6Z7hRuFlbQekCEwapjUt6QF1gne+vNgB20MOyIq8=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.showings.scheduleMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/showings/schedule-multiple',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduleMultiple',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduleMultiple',
        'as' => 'manager.showings.scheduleMultiple',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:402:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:201:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Multiple Schedule\'), \\route("{$role}.showings.scheduleMultiple"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010f90000000000000000";}";s:4:"hash";s:44:"Byda9YzKrxHsQKOY6B+drJcnMjR+xL3jdZtS8S2Y94s=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.showings.getQuestion' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/showings/get-question/{question}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@getQuestion',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@getQuestion',
        'as' => 'manager.showings.getQuestion',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.showings.answerQuestion' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/showings/answer-question',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@answerQuestion',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@answerQuestion',
        'as' => 'manager.showings.answerQuestion',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'manager/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.properties.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@index',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@index',
        'as' => 'owner.properties.index',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:384:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:185:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Properties\'), \\route("{$role}.properties.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010f10000000000000000";}";s:4:"hash";s:44:"oNjzfaGmE4lqNmRAX9yydMbXEnAIXZPnx1a1AAiIsVg=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.properties.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/properties/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@create',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@create',
        'as' => 'owner.properties.create',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:397:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:198:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.properties.index")->push(\\__(\'Create Property\'), \\route("{$role}.properties.create"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010f10000000000000000";}";s:4:"hash";s:44:"OeVN5PavhMhDwv0PJIsgiFj+1grvsVpwm26GdY637rk=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.properties.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'owner/properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@store',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@store',
        'as' => 'owner.properties.store',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.properties.performanceReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/properties/performance-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@performanceReport',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@performanceReport',
        'as' => 'owner.properties.performanceReport',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:404:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:205:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Performance Report\'), \\route("{$role}.properties.performanceReport"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010f50000000000000000";}";s:4:"hash";s:44:"pEaaoZFdmBRZ2vUKqvYN+IPdR3T+AcWVq+TJub2Cgak=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.properties.sentPerformanceReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/properties/sent-performance-report/{pId?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@sentPerformanceReport',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@sentPerformanceReport',
        'as' => 'owner.properties.sentPerformanceReport',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:420:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:221:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.properties.performanceReport")->push(\\__(\'Sent Report\'), \\route("{$role}.properties.sentPerformanceReport"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010f50000000000000000";}";s:4:"hash";s:44:"QYmPVrFO8AwhVUl95o5wvKkHJqeiUIGnoKayYqMKK5A=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.properties.sendPerformanceReport' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'owner/properties/send-performance-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@sendPerformanceReport',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@sendPerformanceReport',
        'as' => 'owner.properties.sendPerformanceReport',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.properties.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/properties/{property}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@edit',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@edit',
        'as' => 'owner.properties.edit',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/properties/{property}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:457:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:258:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $property) use ($role) {
                    $trail->parent("{$role}.properties.index")->push(\\__(\':property\', [\'property\' => $property->title]), \\route("{$role}.properties.edit", $property->id));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010ed0000000000000000";}";s:4:"hash";s:44:"dRzKmPVbPM2GnsKJpjKPs+WbLEIECfsL5iubINNiVqo=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.properties.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'owner/properties/{property}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@update',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@update',
        'as' => 'owner.properties.update',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/properties/{property}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.properties.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'owner/properties/{property}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@destroy',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@destroy',
        'as' => 'owner.properties.destroy',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/properties/{property}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.properties.makeFeatured' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'owner/properties/{property}/make-featured',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@makeFeatured',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@makeFeatured',
        'as' => 'owner.properties.makeFeatured',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/properties/{property}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.properties.removePropertyMedia' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'owner/properties/delete-property-media/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@removePropertyMedia',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@removePropertyMedia',
        'as' => 'owner.properties.removePropertyMedia',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.buildings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/buildings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@index',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@index',
        'as' => 'owner.buildings.index',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:382:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:183:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Buildings\'), \\route("{$role}.buildings.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010e70000000000000000";}";s:4:"hash";s:44:"0FguuNbc4L3fZIDVaTpTdlCGbu7LCspVLdnRvlVTQyg=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.buildings.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/buildings/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@create',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@create',
        'as' => 'owner.buildings.create',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:395:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:196:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.buildings.index")->push(\\__(\'Create Building\'), \\route("{$role}.buildings.create"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010e70000000000000000";}";s:4:"hash";s:44:"5j4MYSVpayulDf7NLQRYsNLOzlpv/GhuXaRqsQAgjsc=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.buildings.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'owner/buildings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@store',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@store',
        'as' => 'owner.buildings.store',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.buildings.requestBuilding' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'owner/buildings/request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@store',
        'controller' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@store',
        'as' => 'owner.buildings.requestBuilding',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.buildings.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/buildings/request-building',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@index',
        'controller' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@index',
        'as' => 'owner.buildings.request',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.buildings.request.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/buildings/request-building/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@edit',
        'controller' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@edit',
        'as' => 'owner.buildings.request.edit',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.buildings.request.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'owner/buildings/request-building/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@update',
        'controller' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@update',
        'as' => 'owner.buildings.request.update',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.buildings.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/buildings/{building}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@edit',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@edit',
        'as' => 'owner.buildings.edit',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/buildings/{building}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:541:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:342:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $building) use ($role) {
                    $building = \\Modules\\Property\\Entities\\Building::find($building);
                    $trail->parent("{$role}.buildings.index")->push(\\__(\':building\', [\'building\' => $building->title]), \\route("{$role}.buildings.edit", $building->id));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010df0000000000000000";}";s:4:"hash";s:44:"JuTDSyb6/gTXNWJGrzkA9pb4V26NQuMQ/NrL+sYj5zs=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.buildings.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'owner/buildings/{building}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@update',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@update',
        'as' => 'owner.buildings.update',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/buildings/{building}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.buildings.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'owner/buildings/{building}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@destroy',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@destroy',
        'as' => 'owner.buildings.destroy',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/buildings/{building}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.buildings.removeBuildingMedia' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'owner/buildings/delete-building-media/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@removeBuildingMedia',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@removeBuildingMedia',
        'as' => 'owner.buildings.removeBuildingMedia',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.showings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/showings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@index',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@index',
        'as' => 'owner.showings.index',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:380:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:181:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Showings\'), \\route("{$role}.showings.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010dc0000000000000000";}";s:4:"hash";s:44:"mwS92u3YADhA5YVyG8kppfNMHxxJdqAIVPy8tnKKpQk=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.showings.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'owner/showings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@store',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@store',
        'as' => 'owner.showings.store',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.showings.scheduled' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/showings/scheduled',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduledShowings',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduledShowings',
        'as' => 'owner.showings.scheduled',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:394:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:195:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Scheduled Showings\'), \\route("{$role}.showings.scheduled"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010d90000000000000000";}";s:4:"hash";s:44:"EGQQtxlbSU1VNtSeeViGcjakpeRCwTpQTLFL/6Q16Tc=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.showings.scheduledEdit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'owner/showings/scheduled/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@updateScheduledShowings',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@updateScheduledShowings',
        'as' => 'owner.showings.scheduledEdit',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:403:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:204:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Scheduled Showings Edit\'), \\route("{$role}.showings.scheduledEdit"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010d90000000000000000";}";s:4:"hash";s:44:"FqrBcuNgbyj/B3nextzGco0blpFKA0mHArpmdY6A8Dk=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.showings.requests' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/showings/requests/{showingId?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@showingRequest',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@showingRequest',
        'as' => 'owner.showings.requests',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:391:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:192:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Showings Request\'), \\route("{$role}.showings.requests"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010d90000000000000000";}";s:4:"hash";s:44:"BmRHqakSfeVOlrLWmuZSEyVkIOv/Db1JLuaMARV2ImE=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.showings.requestsStatus' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'owner/showings/requests/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@showingRequestStatus',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@showingRequestStatus',
        'as' => 'owner.showings.requestsStatus',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:404:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:205:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Showings Request Status\'), \\route("{$role}.showings.requestsStatus"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010d90000000000000000";}";s:4:"hash";s:44:"AU7xCSvkdxduUtI0xajvVnIQ6V2uLhmFm2s2vDhRDYE=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.showings.questions' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/showings/questions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@askedQuestions',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@askedQuestions',
        'as' => 'owner.showings.questions',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:391:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:192:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Asked Questions\'), \\route("{$role}.showings.questions"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010d90000000000000000";}";s:4:"hash";s:44:"/vAgjcevWWJYGOMSmT/gXiwHnOkhXO6Mcag/EclKz8w=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.showings.scheduleMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/showings/schedule-multiple',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduleMultiple',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduleMultiple',
        'as' => 'owner.showings.scheduleMultiple',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:400:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:201:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Multiple Schedule\'), \\route("{$role}.showings.scheduleMultiple"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010d90000000000000000";}";s:4:"hash";s:44:"C4l8KXWbmmFySn7Xp2ox/nx6GhBnhGkuyEUVgYbtvjE=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.showings.getQuestion' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'owner/showings/get-question/{question}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@getQuestion',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@getQuestion',
        'as' => 'owner.showings.getQuestion',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.showings.answerQuestion' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'owner/showings/answer-question',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@answerQuestion',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@answerQuestion',
        'as' => 'owner.showings.answerQuestion',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'owner/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.properties.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@index',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@index',
        'as' => 'agent.properties.index',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:384:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:185:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Properties\'), \\route("{$role}.properties.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010d10000000000000000";}";s:4:"hash";s:44:"N6G0a1vhbiMx9QjRhZil9SDI/zulg3X1NeR0AQlpAns=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.properties.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/properties/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@create',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@create',
        'as' => 'agent.properties.create',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:397:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:198:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.properties.index")->push(\\__(\'Create Property\'), \\route("{$role}.properties.create"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010d10000000000000000";}";s:4:"hash";s:44:"FJSiO6OYkMMLJVkYBuHk8FQhLtOUxNCqjJiv+FAEGow=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.properties.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agent/properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@store',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@store',
        'as' => 'agent.properties.store',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.properties.performanceReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/properties/performance-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@performanceReport',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@performanceReport',
        'as' => 'agent.properties.performanceReport',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:404:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:205:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Performance Report\'), \\route("{$role}.properties.performanceReport"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010d50000000000000000";}";s:4:"hash";s:44:"Eid6vK3U5ULRV1XIEnwEl0Rs0Cmx3A8Uz4zlmy64lyA=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.properties.sentPerformanceReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/properties/sent-performance-report/{pId?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@sentPerformanceReport',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@sentPerformanceReport',
        'as' => 'agent.properties.sentPerformanceReport',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:420:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:221:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.properties.performanceReport")->push(\\__(\'Sent Report\'), \\route("{$role}.properties.sentPerformanceReport"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010d50000000000000000";}";s:4:"hash";s:44:"v3/71+59cPkJmMIE0Xii/miUGV7pjBfQMUioQk/t0kA=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.properties.sendPerformanceReport' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agent/properties/send-performance-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@sendPerformanceReport',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@sendPerformanceReport',
        'as' => 'agent.properties.sendPerformanceReport',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.properties.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/properties/{property}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@edit',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@edit',
        'as' => 'agent.properties.edit',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/properties/{property}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:457:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:258:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $property) use ($role) {
                    $trail->parent("{$role}.properties.index")->push(\\__(\':property\', [\'property\' => $property->title]), \\route("{$role}.properties.edit", $property->id));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010cd0000000000000000";}";s:4:"hash";s:44:"PTb1hXqjF0Z9yUmyGChGDvAul+gothR1WKARytUYEec=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.properties.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'agent/properties/{property}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@update',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@update',
        'as' => 'agent.properties.update',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/properties/{property}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.properties.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'agent/properties/{property}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@destroy',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@destroy',
        'as' => 'agent.properties.destroy',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/properties/{property}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.properties.makeFeatured' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agent/properties/{property}/make-featured',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@makeFeatured',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@makeFeatured',
        'as' => 'agent.properties.makeFeatured',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/properties/{property}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.properties.removePropertyMedia' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'agent/properties/delete-property-media/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@removePropertyMedia',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@removePropertyMedia',
        'as' => 'agent.properties.removePropertyMedia',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.buildings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/buildings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@index',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@index',
        'as' => 'agent.buildings.index',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:382:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:183:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Buildings\'), \\route("{$role}.buildings.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010c70000000000000000";}";s:4:"hash";s:44:"kJMJzsn4Xa9nHiGYBww6UF6wdg1HQDwcvRVeIGo29WY=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.buildings.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/buildings/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@create',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@create',
        'as' => 'agent.buildings.create',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:395:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:196:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.buildings.index")->push(\\__(\'Create Building\'), \\route("{$role}.buildings.create"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010c70000000000000000";}";s:4:"hash";s:44:"RwCpogahvi66ucDJDJn42KrGrF1+NuxjSqqARZ/AoiM=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.buildings.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agent/buildings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@store',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@store',
        'as' => 'agent.buildings.store',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.buildings.requestBuilding' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agent/buildings/request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@store',
        'controller' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@store',
        'as' => 'agent.buildings.requestBuilding',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.buildings.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/buildings/request-building',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@index',
        'controller' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@index',
        'as' => 'agent.buildings.request',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.buildings.request.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/buildings/request-building/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@edit',
        'controller' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@edit',
        'as' => 'agent.buildings.request.edit',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.buildings.request.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'agent/buildings/request-building/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@update',
        'controller' => 'Modules\\Property\\Http\\Controllers\\RequestBuildingController@update',
        'as' => 'agent.buildings.request.update',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.buildings.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/buildings/{building}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@edit',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@edit',
        'as' => 'agent.buildings.edit',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/buildings/{building}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:541:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:342:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $building) use ($role) {
                    $building = \\Modules\\Property\\Entities\\Building::find($building);
                    $trail->parent("{$role}.buildings.index")->push(\\__(\':building\', [\'building\' => $building->title]), \\route("{$role}.buildings.edit", $building->id));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010bf0000000000000000";}";s:4:"hash";s:44:"Y9UCyHmAr0nWbqreDCgBU4d5b3L2anKjPHCp/qYMUoQ=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.buildings.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'agent/buildings/{building}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@update',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@update',
        'as' => 'agent.buildings.update',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/buildings/{building}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.buildings.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'agent/buildings/{building}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@destroy',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@destroy',
        'as' => 'agent.buildings.destroy',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/buildings/{building}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.buildings.removeBuildingMedia' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'agent/buildings/delete-building-media/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@removeBuildingMedia',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@removeBuildingMedia',
        'as' => 'agent.buildings.removeBuildingMedia',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.showings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/showings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@index',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@index',
        'as' => 'agent.showings.index',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:380:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:181:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Showings\'), \\route("{$role}.showings.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010bc0000000000000000";}";s:4:"hash";s:44:"npzX3UZ/QwVAFgkoyHbIuiq2aZ2wiwjWfM3OJUkzLYM=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.showings.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agent/showings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@store',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@store',
        'as' => 'agent.showings.store',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.showings.scheduled' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/showings/scheduled',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduledShowings',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduledShowings',
        'as' => 'agent.showings.scheduled',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:394:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:195:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Scheduled Showings\'), \\route("{$role}.showings.scheduled"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010b90000000000000000";}";s:4:"hash";s:44:"lm35e0qGOpuz8atKUfUaMW64zbOpn7xowt8Knmhqcy0=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.showings.scheduledEdit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agent/showings/scheduled/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@updateScheduledShowings',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@updateScheduledShowings',
        'as' => 'agent.showings.scheduledEdit',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:403:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:204:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Scheduled Showings Edit\'), \\route("{$role}.showings.scheduledEdit"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010b90000000000000000";}";s:4:"hash";s:44:"zl0A4dmZJwCpahpQ+5wVi/4i+/UiSEz+nkIOg7vrc24=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.showings.requests' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/showings/requests/{showingId?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@showingRequest',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@showingRequest',
        'as' => 'agent.showings.requests',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:391:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:192:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Showings Request\'), \\route("{$role}.showings.requests"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010b90000000000000000";}";s:4:"hash";s:44:"JDPWYQ4AyOZwKphNyZcvj8kIsoVzs8fDWJI5DNvQQVs=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.showings.requestsStatus' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agent/showings/requests/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@showingRequestStatus',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@showingRequestStatus',
        'as' => 'agent.showings.requestsStatus',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:404:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:205:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Showings Request Status\'), \\route("{$role}.showings.requestsStatus"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010b90000000000000000";}";s:4:"hash";s:44:"Csknx8TYDdreyld9JLqrh4qGtddpzCHtrXhaDYX5hpQ=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.showings.questions' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/showings/questions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@askedQuestions',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@askedQuestions',
        'as' => 'agent.showings.questions',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:391:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:192:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Asked Questions\'), \\route("{$role}.showings.questions"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010b90000000000000000";}";s:4:"hash";s:44:"E/mZ4Kb9U8rDcy87QpIbZCFY9jcB6CFCKAUsy0GlT7c=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.showings.scheduleMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/showings/schedule-multiple',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduleMultiple',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduleMultiple',
        'as' => 'agent.showings.scheduleMultiple',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:400:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:201:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Multiple Schedule\'), \\route("{$role}.showings.scheduleMultiple"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010b90000000000000000";}";s:4:"hash";s:44:"jlt8I/EJFicvfPZDS4m2/gWokpfiayQnDUnQE6yXz4c=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.showings.getQuestion' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agent/showings/get-question/{question}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@getQuestion',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@getQuestion',
        'as' => 'agent.showings.getQuestion',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.showings.answerQuestion' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agent/showings/answer-question',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@answerQuestion',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@answerQuestion',
        'as' => 'agent.showings.answerQuestion',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => 'agent/showings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'properties.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'properties',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@propertiesIndex',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@propertiesIndex',
        'as' => 'properties.index',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => '/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:373:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:154:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) {
            $trail->parent(\'frontend.index\')->push(\\__(\'Properties\'), \\route(\'properties.index\'));
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000010b20000000000000000";}";s:4:"hash";s:44:"1uxu8Zg3h+y+ZHPujpTa3Mume08PL7rCa9tpAFHT2Pk=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'properties.propertyShowingAjax' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'properties/schedule-showing-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@propertyShowingAjax',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@propertyShowingAjax',
        'as' => 'properties.propertyShowingAjax',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => '/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'properties.applyShowing' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'properties/apply-showing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@applyShowing',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@applyShowing',
        'as' => 'properties.applyShowing',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => '/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'properties.askQuestion' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'properties/ask-question',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@askQuestion',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@askQuestion',
        'as' => 'properties.askQuestion',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => '/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'properties.scheduleMultiple' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'properties/multiple-schedule',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduleMultiple',
        'controller' => 'Modules\\Property\\Http\\Controllers\\ShowingController@scheduleMultiple',
        'as' => 'properties.scheduleMultiple',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => '/properties',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'property.infoWindow' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'property/property-info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@infoWindow',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@infoWindow',
        'as' => 'property.infoWindow',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => '/property',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'property.single' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'property/{property}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@singleProperty',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@singleProperty',
        'as' => 'property.single',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => '/property',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:531:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:312:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $property) {
            $property = \\Modules\\Property\\Entities\\Property::where(\'slug\', $property)->first();
            $trail->parent(\'properties.index\')->push(\\__(\':property\', [\'property\' => $property->title]), \\route(\'property.single\', $property->slug));
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000010ae0000000000000000";}";s:4:"hash";s:44:"I1pokAVIu+qopaYGlKksTKGjDYtEilEKG4wczoTF0Bg=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'buildings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'buildings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@buildingsIndex',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@buildingsIndex',
        'as' => 'buildings.index',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => '/buildings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:371:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:152:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) {
            $trail->parent(\'frontend.index\')->push(\\__(\'Buildings\'), \\route(\'buildings.index\'));
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000010ae0000000000000000";}";s:4:"hash";s:44:"rjH2JYzpZG7PBHZ9JXTvFeBY8hs6ZZry9e90cntRv/M=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'building.infoWindow' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'building/property-info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\PropertyController@infoWindow',
        'controller' => 'Modules\\Property\\Http\\Controllers\\PropertyController@infoWindow',
        'as' => 'building.infoWindow',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => '/building',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'building.single' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'building/{building}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Property\\Http\\Controllers\\BuildingController@singleProperty',
        'controller' => 'Modules\\Property\\Http\\Controllers\\BuildingController@singleProperty',
        'as' => 'building.single',
        'namespace' => 'Modules\\Property\\Http\\Controllers',
        'prefix' => '/building',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:546:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:327:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $building) {
            $building = \\Modules\\Property\\Entities\\Building::where(\'slug\', $building)->first();
            $trail->parent(\'buildings.index\')->push(\\__(\':building\', [\'building\' => $building->title]), \\route(\'building.single\', [\'building\' => $building->slug]));
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000010aa0000000000000000";}";s:4:"hash";s:44:"NCsicrKgQfALtKHP7u0ZfKR4o8SdeTUs/KwEam4A3y0=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JwXOi2jo8ZIxRajT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/rentalapplication',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000010a20000000000000000";}}',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::JwXOi2jo8ZIxRajT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rental_application.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rental-application',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@rentalApplicationIndex',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@rentalApplicationIndex',
        'as' => 'admin.rental_application.index',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'admin/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:400:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:201:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Rental Application\'), \\route("{$role}.rental_application.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011330000000000000000";}";s:4:"hash";s:44:"VELL6I+YzKcdPo3XECvpMBNr1p6unoEN043L+c3x1Yg=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rental_application.leasingApplication' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rental-application/leasing-application/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@leasingApplication',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@leasingApplication',
        'as' => 'admin.rental_application.leasingApplication',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'admin/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:449:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:250:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $id) use ($role) {
                $trail->parent("{$role}.rental_application.index")->push(\\__(\'Leasing Application\'), \\route("{$role}.rental_application.leasingApplication", [\'id\' => $id]));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011330000000000000000";}";s:4:"hash";s:44:"PQXbLb9ZH5KD7iyFFw3QfLPLxYc/kRqBlozq5yXao9c=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rental_application.screeningQuestion' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rental-application/screening-question',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\ScreeningQuestionController@index',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\ScreeningQuestionController@index',
        'as' => 'admin.rental_application.screeningQuestion',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'admin/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:428:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:229:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.rental_application.index")->push(\\__(\'Screening Questions\'), \\route("{$role}.rental_application.screeningQuestion"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000011330000000000000000";}";s:4:"hash";s:44:"mVjOa3Z5EMSt5652W5oUsWxGrw3ORx3g+k2qyzMUkDI=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rental_application.submitScreeningQuestion' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/rental-application/submit-screening-question',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@submitScreeningQuestion',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@submitScreeningQuestion',
        'as' => 'admin.rental_application.submitScreeningQuestion',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'admin/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.rental_application.sendRentaApplicationVerification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/rental-application/send-verification/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@sendRentaApplicationVerification',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@sendRentaApplicationVerification',
        'as' => 'admin.rental_application.sendRentaApplicationVerification',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'admin/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'screeningRentalApplication' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'screening/{type}/{application_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@screeningRentalApplication',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@screeningRentalApplication',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'screeningRentalApplication',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'previewApplicationForm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'preview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@preview',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@preview',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'previewApplicationForm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'applicationForm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'apply/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@applicationForm',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@applicationForm',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'applicationForm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resumeApply' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'apply/resume/{applicationId}/{propertyId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@resumeApply',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@resumeApply',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'resumeApply',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'previewApplication' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'preview/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@leasingApplication',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@leasingApplication',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'previewApplication',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rentalApplicationSave' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@store',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@store',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'rentalApplicationSave',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rentalApplicationComplete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'completed/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:81:"function () {
            return \\view(\'rentalapplication::completed\');
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000010970000000000000000";}}',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'rentalApplicationComplete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.rental_application.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/rental-application',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@rentalApplicationIndex',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@rentalApplicationIndex',
        'as' => 'manager.rental_application.index',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'manager/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:402:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:201:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Rental Application\'), \\route("{$role}.rental_application.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010930000000000000000";}";s:4:"hash";s:44:"vHhoa4Sy6fS1i0uIX6lkzJxMVAFpsC1qAEfU0cgT+iE=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.rental_application.leasingApplication' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/rental-application/leasing-application/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@leasingApplication',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@leasingApplication',
        'as' => 'manager.rental_application.leasingApplication',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'manager/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:451:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:250:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $id) use ($role) {
                $trail->parent("{$role}.rental_application.index")->push(\\__(\'Leasing Application\'), \\route("{$role}.rental_application.leasingApplication", [\'id\' => $id]));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010930000000000000000";}";s:4:"hash";s:44:"NK1NyGW+jfTkR80pOSSBHASt7ktbedPCJSzbg+9AQaY=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.rental_application.screeningQuestion' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/rental-application/screening-question',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\ScreeningQuestionController@index',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\ScreeningQuestionController@index',
        'as' => 'manager.rental_application.screeningQuestion',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'manager/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:430:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:229:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.rental_application.index")->push(\\__(\'Screening Questions\'), \\route("{$role}.rental_application.screeningQuestion"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010930000000000000000";}";s:4:"hash";s:44:"nvZutqXJuOhnUzriQb1/atqLZIkl+iweYe0ChD3POzY=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.rental_application.submitScreeningQuestion' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/rental-application/submit-screening-question',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@submitScreeningQuestion',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@submitScreeningQuestion',
        'as' => 'manager.rental_application.submitScreeningQuestion',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'manager/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.rental_application.sendRentaApplicationVerification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/rental-application/send-verification/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@sendRentaApplicationVerification',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@sendRentaApplicationVerification',
        'as' => 'manager.rental_application.sendRentaApplicationVerification',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'manager/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.rental_application.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/rental-application',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@rentalApplicationIndex',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@rentalApplicationIndex',
        'as' => 'owner.rental_application.index',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'owner/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:400:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:201:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Rental Application\'), \\route("{$role}.rental_application.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000108d0000000000000000";}";s:4:"hash";s:44:"KhIjE8GFbcoDNIbyj51jV2KQBpIbP5DJY2piGgKi5BI=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.rental_application.leasingApplication' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/rental-application/leasing-application/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@leasingApplication',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@leasingApplication',
        'as' => 'owner.rental_application.leasingApplication',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'owner/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:449:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:250:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $id) use ($role) {
                $trail->parent("{$role}.rental_application.index")->push(\\__(\'Leasing Application\'), \\route("{$role}.rental_application.leasingApplication", [\'id\' => $id]));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000108d0000000000000000";}";s:4:"hash";s:44:"4p4KUI5+BmU6sddRoni/Qmfy7cEyFoZPoaAIbG6mw8U=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.rental_application.screeningQuestion' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/rental-application/screening-question',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\ScreeningQuestionController@index',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\ScreeningQuestionController@index',
        'as' => 'owner.rental_application.screeningQuestion',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'owner/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:428:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:229:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.rental_application.index")->push(\\__(\'Screening Questions\'), \\route("{$role}.rental_application.screeningQuestion"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000108d0000000000000000";}";s:4:"hash";s:44:"VvbBLdDNhsaDhhIDPAk2yOTfadWFrEk1P60TJoJ+MrM=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.rental_application.submitScreeningQuestion' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'owner/rental-application/submit-screening-question',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@submitScreeningQuestion',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@submitScreeningQuestion',
        'as' => 'owner.rental_application.submitScreeningQuestion',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'owner/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.rental_application.sendRentaApplicationVerification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'owner/rental-application/send-verification/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@sendRentaApplicationVerification',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@sendRentaApplicationVerification',
        'as' => 'owner.rental_application.sendRentaApplicationVerification',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'owner/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.rental_application.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/rental-application',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@rentalApplicationIndex',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@rentalApplicationIndex',
        'as' => 'agent.rental_application.index',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'agent/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:400:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:201:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Rental Application\'), \\route("{$role}.rental_application.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010880000000000000000";}";s:4:"hash";s:44:"/H3btN0lQr+Wu/Y0BtiAAGTn/KpLVXWQnm6zxI5DvfU=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.rental_application.leasingApplication' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/rental-application/leasing-application/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@leasingApplication',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@leasingApplication',
        'as' => 'agent.rental_application.leasingApplication',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'agent/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:449:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:250:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $id) use ($role) {
                $trail->parent("{$role}.rental_application.index")->push(\\__(\'Leasing Application\'), \\route("{$role}.rental_application.leasingApplication", [\'id\' => $id]));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010880000000000000000";}";s:4:"hash";s:44:"wJMSMBgT6D4kkjbF6Uuot7Oxxee1rjZx+NDECOuwsj8=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.rental_application.screeningQuestion' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/rental-application/screening-question',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\ScreeningQuestionController@index',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\ScreeningQuestionController@index',
        'as' => 'agent.rental_application.screeningQuestion',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'agent/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:428:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:229:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.rental_application.index")->push(\\__(\'Screening Questions\'), \\route("{$role}.rental_application.screeningQuestion"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010880000000000000000";}";s:4:"hash";s:44:"ugp/Pu06PckuaufhlbaZk8HAcmRvAanRAdBXrMRrHvA=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.rental_application.submitScreeningQuestion' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agent/rental-application/submit-screening-question',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@submitScreeningQuestion',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@submitScreeningQuestion',
        'as' => 'agent.rental_application.submitScreeningQuestion',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'agent/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.rental_application.sendRentaApplicationVerification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agent/rental-application/send-verification/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@sendRentaApplicationVerification',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@sendRentaApplicationVerification',
        'as' => 'agent.rental_application.sendRentaApplicationVerification',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => 'agent/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rental_application.rentalApplication' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'rental-application',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@index',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@index',
        'as' => 'rental_application.rentalApplication',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => '/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:401:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:182:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) {
            $trail->parent(\'frontend.index\')->push(\\__(\'Rental Application\'), \\route(\'rental_application.rentalApplication\'));
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000010850000000000000000";}";s:4:"hash";s:44:"smxwKqiTL+vjJ4NDSd6XTGUHlE0U+dumXK6oB3aO2uI=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rental_application.screeningRentalApplication' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'rental-application/screening/{type}/{application_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@screeningRentalApplication',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@screeningRentalApplication',
        'as' => 'rental_application.screeningRentalApplication',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => '/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rental_application.previewApplicationForm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'rental-application/preview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@preview',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@preview',
        'as' => 'rental_application.previewApplicationForm',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => '/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rental_application.applicationForm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'rental-application/apply/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@applicationForm',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@applicationForm',
        'as' => 'rental_application.applicationForm',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => '/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rental_application.resumeApply' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'rental-application/apply/resume/{applicationId}/{propertyId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@resumeApply',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@resumeApply',
        'as' => 'rental_application.resumeApply',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => '/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rental_application.rentalApplicationPreviw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'rental-application/preview/{id?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@leasingApplication',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@leasingApplication',
        'as' => 'rental_application.rentalApplicationPreviw',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => '/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rental_application.rentalApplicationSave' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'rental-application/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@store',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@store',
        'as' => 'rental_application.rentalApplicationSave',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => '/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rental_application.rentalApplicationComplete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'rental-application/completed/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:89:"function () {
                return \\view(\'rentalapplication::completed\');
            }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000000107e0000000000000000";}}',
        'as' => 'rental_application.rentalApplicationComplete',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => '/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rental_application.rentalApplicationSubmit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'rental-application/submit-rental-application',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@store',
        'controller' => 'Modules\\RentalApplication\\Http\\Controllers\\RentalApplicationController@store',
        'as' => 'rental_application.rentalApplicationSubmit',
        'namespace' => 'Modules\\RentalApplication\\Http\\Controllers',
        'prefix' => '/rental-application',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ACJd9t9ZfGj6VAlM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/tenant',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000010740000000000000000";}}',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ACJd9t9ZfGj6VAlM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tenant.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tenant',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@index',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@index',
        'as' => 'admin.tenant.index',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'admin/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:376:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:177:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Tenant\'), \\route("{$role}.tenant.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000107c0000000000000000";}";s:4:"hash";s:44:"f2CU/+yoFey2LMv6sgRnpU69AXqrsldIy4jFYvLBWxc=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tenant.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/tenant',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@store',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@store',
        'as' => 'admin.tenant.store',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'admin/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tenant.tenantAgreements' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tenant/agreements',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@index',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@index',
        'as' => 'admin.tenant.tenantAgreements',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'admin/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:394:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:195:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.tenant.index")->push(\\__(\'Agreements\'), \\route("{$role}.tenant.tenantAgreements"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010770000000000000000";}";s:4:"hash";s:44:"4M+DsVsiwk0jh1uf0/c6IQ3MVES/TcHS6fBoXWIJBjY=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tenant.tenancyEndNotice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tenant/tenancy-end-notices',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenancyEndNoticeController@index',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenancyEndNoticeController@index',
        'as' => 'admin.tenant.tenancyEndNotice',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'admin/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:402:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:203:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.tenant.index")->push(\\__(\'Tenancy End Notice\'), \\route("{$role}.tenant.tenancyEndNotice"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010770000000000000000";}";s:4:"hash";s:44:"RYts3CQHjzdudm+qVy5czNmC/Dy8IKOQTxG7fa+verQ=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tenant.savePdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tenant/download/{type}/{id}/{access_token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@savePdf',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@savePdf',
        'as' => 'admin.tenant.savePdf',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'admin/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:588:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:389:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $type = \\request()->route(\'type\');
                $id = \\request()->route(\'id\');
                $access_token = \\request()->route(\'access_token\');
                $trail->parent("{$role}.tenant.index")->push(\\__(\'Download\'), \\route("{$role}.tenant.savePdf", \\compact(\'type\', \'id\', \'access_token\')));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010770000000000000000";}";s:4:"hash";s:44:"Xg5YPVbYFrAV02MQiRsOeBge6z/HFfZn4sDAtTGMdpg=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tenant.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tenant/{tenant}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@edit',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@edit',
        'as' => 'admin.tenant.edit',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'admin/tenant/{tenant}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:447:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"admin";}s:8:"function";s:248:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $tenant) use ($role) {
                    $trail->parent("{$role}.tenant.index")->push(\\__(\'Editing :tenant\', [\'tenant\' => $tenant->title]), \\route("{$role}.tenant.edit", $tenant->id));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000106c0000000000000000";}";s:4:"hash";s:44:"tkiVfriyZf6ssP9K7DPTvBBXMBFNWam0D47ht/GXUYI=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tenant.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/tenant/{tenant}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@update',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@update',
        'as' => 'admin.tenant.update',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'admin/tenant/{tenant}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tenant.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/tenant/{tenant}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@destroy',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@destroy',
        'as' => 'admin.tenant.destroy',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'admin/tenant/{tenant}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tenant.makeFeatured' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/tenant/{tenant}/make-featured',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@makeFeatured',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@makeFeatured',
        'as' => 'admin.tenant.makeFeatured',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'admin/tenant/{tenant}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.tenant.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/tenant',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@index',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@index',
        'as' => 'manager.tenant.index',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'manager/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:378:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:177:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Tenant\'), \\route("{$role}.tenant.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010670000000000000000";}";s:4:"hash";s:44:"UQRKw9Inmeg/9a+8CI4cwG9kfGCo/kYf1zpdujtH+2o=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.tenant.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/tenant',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@store',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@store',
        'as' => 'manager.tenant.store',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'manager/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.tenant.tenantAgreements' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/tenant/agreements',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@index',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@index',
        'as' => 'manager.tenant.tenantAgreements',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'manager/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:396:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:195:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.tenant.index")->push(\\__(\'Agreements\'), \\route("{$role}.tenant.tenantAgreements"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010650000000000000000";}";s:4:"hash";s:44:"wrcZLN/yRBfGB2dNGrPzS7eRwVJ+YfMS664tqK9SWPE=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.tenant.tenancyEndNotice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/tenant/tenancy-end-notices',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenancyEndNoticeController@index',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenancyEndNoticeController@index',
        'as' => 'manager.tenant.tenancyEndNotice',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'manager/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:404:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:203:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.tenant.index")->push(\\__(\'Tenancy End Notice\'), \\route("{$role}.tenant.tenancyEndNotice"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010650000000000000000";}";s:4:"hash";s:44:"malVrDIm4T1NqspS6P3Cvrl8zpIFwGSQvV9O2gEsEvo=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.tenant.savePdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/tenant/download/{type}/{id}/{access_token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@savePdf',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@savePdf',
        'as' => 'manager.tenant.savePdf',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'manager/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:590:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:389:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $type = \\request()->route(\'type\');
                $id = \\request()->route(\'id\');
                $access_token = \\request()->route(\'access_token\');
                $trail->parent("{$role}.tenant.index")->push(\\__(\'Download\'), \\route("{$role}.tenant.savePdf", \\compact(\'type\', \'id\', \'access_token\')));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010650000000000000000";}";s:4:"hash";s:44:"0wJcp2Usfo6pRr6zmrPlaV307cl2sO6+uWq6vmYvUi8=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.tenant.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'manager/tenant/{tenant}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@edit',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@edit',
        'as' => 'manager.tenant.edit',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'manager/tenant/{tenant}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:449:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:7:"manager";}s:8:"function";s:248:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $tenant) use ($role) {
                    $trail->parent("{$role}.tenant.index")->push(\\__(\'Editing :tenant\', [\'tenant\' => $tenant->title]), \\route("{$role}.tenant.edit", $tenant->id));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010630000000000000000";}";s:4:"hash";s:44:"JqgXb4m7SDILsJ8gyGA+ItnxedB6JD+O7dI9HfNyY3Y=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.tenant.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'manager/tenant/{tenant}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@update',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@update',
        'as' => 'manager.tenant.update',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'manager/tenant/{tenant}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.tenant.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'manager/tenant/{tenant}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@destroy',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@destroy',
        'as' => 'manager.tenant.destroy',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'manager/tenant/{tenant}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'manager.tenant.makeFeatured' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'manager/tenant/{tenant}/make-featured',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'manager',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@makeFeatured',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@makeFeatured',
        'as' => 'manager.tenant.makeFeatured',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'manager/tenant/{tenant}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.tenant.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/tenant',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@index',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@index',
        'as' => 'owner.tenant.index',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'owner/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:376:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:177:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Tenant\'), \\route("{$role}.tenant.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000105e0000000000000000";}";s:4:"hash";s:44:"ugT7lZ412ZGjYW9nNNRaw1cdzalr+JSDpEUvTMo2vNc=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.tenant.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'owner/tenant',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@store',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@store',
        'as' => 'owner.tenant.store',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'owner/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.tenant.tenantAgreements' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/tenant/agreements',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@index',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@index',
        'as' => 'owner.tenant.tenantAgreements',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'owner/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:394:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:195:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.tenant.index")->push(\\__(\'Agreements\'), \\route("{$role}.tenant.tenantAgreements"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000105c0000000000000000";}";s:4:"hash";s:44:"2tDdzsuw8MniErV4AsfL2K8sbaaNQSQ/o+kI0GXPnFk=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.tenant.tenancyEndNotice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/tenant/tenancy-end-notices',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenancyEndNoticeController@index',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenancyEndNoticeController@index',
        'as' => 'owner.tenant.tenancyEndNotice',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'owner/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:402:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:203:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.tenant.index")->push(\\__(\'Tenancy End Notice\'), \\route("{$role}.tenant.tenancyEndNotice"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000105c0000000000000000";}";s:4:"hash";s:44:"C1hsXxdhCqW8pJzRPTG5/G2nXJ+kplxOaKotwOcOnCY=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.tenant.savePdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/tenant/download/{type}/{id}/{access_token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@savePdf',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@savePdf',
        'as' => 'owner.tenant.savePdf',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'owner/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:588:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:389:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $type = \\request()->route(\'type\');
                $id = \\request()->route(\'id\');
                $access_token = \\request()->route(\'access_token\');
                $trail->parent("{$role}.tenant.index")->push(\\__(\'Download\'), \\route("{$role}.tenant.savePdf", \\compact(\'type\', \'id\', \'access_token\')));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000105c0000000000000000";}";s:4:"hash";s:44:"037hPx2jgn0RAs4GJEWw0ObBGoSDwg2X5WVsg8BMa3M=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.tenant.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'owner/tenant/{tenant}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@edit',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@edit',
        'as' => 'owner.tenant.edit',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'owner/tenant/{tenant}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:447:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"owner";}s:8:"function";s:248:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $tenant) use ($role) {
                    $trail->parent("{$role}.tenant.index")->push(\\__(\'Editing :tenant\', [\'tenant\' => $tenant->title]), \\route("{$role}.tenant.edit", $tenant->id));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"000000000000105a0000000000000000";}";s:4:"hash";s:44:"t/LDvD+yj5d9YR6pq0BDjcNQEIpbh0NCygD1BNc3ld0=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.tenant.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'owner/tenant/{tenant}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@update',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@update',
        'as' => 'owner.tenant.update',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'owner/tenant/{tenant}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.tenant.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'owner/tenant/{tenant}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@destroy',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@destroy',
        'as' => 'owner.tenant.destroy',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'owner/tenant/{tenant}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'owner.tenant.makeFeatured' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'owner/tenant/{tenant}/make-featured',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'owner',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@makeFeatured',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@makeFeatured',
        'as' => 'owner.tenant.makeFeatured',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'owner/tenant/{tenant}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.tenant.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/tenant',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@index',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@index',
        'as' => 'agent.tenant.index',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'agent/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:376:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:177:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.dashboard")->push(\\__(\'Tenant\'), \\route("{$role}.tenant.index"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010550000000000000000";}";s:4:"hash";s:44:"p1z58PBKsd9dPFBFZyWke4fI9tOqx3ah9uJIth0tmEI=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.tenant.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agent/tenant',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@store',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@store',
        'as' => 'agent.tenant.store',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'agent/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.tenant.tenantAgreements' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/tenant/agreements',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@index',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@index',
        'as' => 'agent.tenant.tenantAgreements',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'agent/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:394:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:195:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.tenant.index")->push(\\__(\'Agreements\'), \\route("{$role}.tenant.tenantAgreements"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010530000000000000000";}";s:4:"hash";s:44:"cyhzDP2/qVzMe1BDjFoaqZHjQsF21yZZIjrBBlusE48=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.tenant.tenancyEndNotice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/tenant/tenancy-end-notices',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenancyEndNoticeController@index',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenancyEndNoticeController@index',
        'as' => 'agent.tenant.tenancyEndNotice',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'agent/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:402:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:203:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $trail->parent("{$role}.tenant.index")->push(\\__(\'Tenancy End Notice\'), \\route("{$role}.tenant.tenancyEndNotice"));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010530000000000000000";}";s:4:"hash";s:44:"reY7R+Nvds04klWb2lXHihBpJ4hJVAAWtvA9+o6V3ZU=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.tenant.savePdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/tenant/download/{type}/{id}/{access_token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@savePdf',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@savePdf',
        'as' => 'agent.tenant.savePdf',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'agent/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:588:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:389:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) use ($role) {
                $type = \\request()->route(\'type\');
                $id = \\request()->route(\'id\');
                $access_token = \\request()->route(\'access_token\');
                $trail->parent("{$role}.tenant.index")->push(\\__(\'Download\'), \\route("{$role}.tenant.savePdf", \\compact(\'type\', \'id\', \'access_token\')));
            }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010530000000000000000";}";s:4:"hash";s:44:"EGsnMhisog0dAK+xrjboG4BnoeXmoFSfbi8SuPTuGWI=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.tenant.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'agent/tenant/{tenant}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
          2 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@edit',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@edit',
        'as' => 'agent.tenant.edit',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'agent/tenant/{tenant}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:447:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:1:{s:4:"role";s:5:"agent";}s:8:"function";s:248:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $tenant) use ($role) {
                    $trail->parent("{$role}.tenant.index")->push(\\__(\'Editing :tenant\', [\'tenant\' => $tenant->title]), \\route("{$role}.tenant.edit", $tenant->id));
                }";s:5:"scope";N;s:4:"this";N;s:4:"self";s:32:"00000000000010510000000000000000";}";s:4:"hash";s:44:"Y77ixY5IHPrqaNvIn8/BuUT1g5pPfg2aJhkcbevCQNg=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.tenant.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'agent/tenant/{tenant}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@update',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@update',
        'as' => 'agent.tenant.update',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'agent/tenant/{tenant}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.tenant.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'agent/tenant/{tenant}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@destroy',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@destroy',
        'as' => 'agent.tenant.destroy',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'agent/tenant/{tenant}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'agent.tenant.makeFeatured' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'agent/tenant/{tenant}/make-featured',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'agent',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@makeFeatured',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantController@makeFeatured',
        'as' => 'agent.tenant.makeFeatured',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => 'agent/tenant/{tenant}',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tenant.agreementForm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'tenant/agreement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@agreementForm',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@agreementForm',
        'as' => 'tenant.agreementForm',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => '/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:376:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:157:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) {
            $trail->parent(\'frontend.index\')->push(\\__(\'Agreement\'), \\route(\'tenant.agreementForm\'));
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000010500000000000000000";}";s:4:"hash";s:44:"N29yvWmSKnqICrwqGIGSchTewRVTsmoFHk67wIelNH8=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tenant.agreementForm.save' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'tenant/agreement/save',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@store',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@store',
        'as' => 'tenant.agreementForm.save',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => '/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:386:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:167:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) {
            $trail->parent(\'frontend.index\')->push(\\__(\'Agreement Form\'), \\route(\'tenant.agreementForm.save\'));
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000010500000000000000000";}";s:4:"hash";s:44:"EbGhbw5Z33VuoFGO4Exk7p7DQ0KCcORMTIlq1Qk5bv8=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tenant.viewTenantAgreement' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'tenant/agreement/{action}/{form_id}/{access_token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@viewTenantAgreement',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@viewTenantAgreement',
        'as' => 'tenant.viewTenantAgreement',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => '/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:500:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:281:"function (\\Tabuna\\Breadcrumbs\\Trail $trail, $action, $form_id, $access_token) {
            $trail->parent(\'frontend.index\')->push(\\__(\'View Agreement\'), \\route(\'tenant.viewTenantAgreement\', [\'action\' => $action, \'form_id\' => $form_id, \'access_token\' => $access_token]));
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000010500000000000000000";}";s:4:"hash";s:44:"WVCFWALLwzZEBpCw2s7zqMrr9iaa68XuKrlAMwHjFDA=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'tenant.saveSign' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'tenant/agreement/image',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'breadcrumbs',
        ),
        'domain' => 'forrentcentral.com',
        'uses' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@saveSign',
        'controller' => 'Modules\\Tenant\\Http\\Controllers\\TenantAgreementController@saveSign',
        'as' => 'tenant.saveSign',
        'namespace' => 'Modules\\Tenant\\Http\\Controllers',
        'prefix' => '/tenant',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'Tabuna\\Breadcrumbs\\BreadcrumbsMiddleware' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:382:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:163:"function (\\Tabuna\\Breadcrumbs\\Trail $trail) {
            $trail->parent(\'frontend.index\')->push(\\__(\'Save Agreement Image\'), \\route(\'tenant.saveSign\'));
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000010500000000000000000";}";s:4:"hash";s:44:"s0pXloDmE/rwYMwjqjfy52/eVKEtL0I6JoDHW5Lx7PM=";}}',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire/update',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\HandleRequests\\HandleRequests@handleUpdate',
        'controller' => 'Livewire\\Mechanisms\\HandleRequests\\HandleRequests@handleUpdate',
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'livewire.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
