<?php

// 特定条件下のバリデーションルールを設定する
$validator = validator($request->all(), [
    'step_authentication' => ['required', Rule::in([UserGroup::STEP_AUTHENTICATION_NO,UserGroup::STEP_AUTHENTICATION_YES])],
    'receive_notification_email' => [
        Rule::requiredIf(function () use ($request) {
            return $request->input('receive_notification_type') == User::RECEIVE_NOTIFICATION_TYPE_ALL || $request->input('receive_notification_type') == User::RECEIVE_NOTIFICATION_TYPE_ERROR;
        }),
    ],
    'receive_notification_type' => ['required', Rule::in([User::RECEIVE_NOTIFICATION_TYPE_ALL,User::RECEIVE_NOTIFICATION_TYPE_ERROR,User::RECEIVE_NOTIFICATION_TYPE_NO])],
], [], __('validation.config.update.attributes'));
