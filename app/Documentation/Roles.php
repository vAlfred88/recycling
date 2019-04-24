<?php

/**
 * @SWG\Get(
 *     tags={"Roles"},
 *     path="/roles",
 *     summary="Get roles list",
 *     description="Get roles list",
 *
 *     @SWG\Response(response=200, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *  * @SWG\Get(
 *     tags={"Roles"},
 *     path="/roles/{role_id}",
 *     summary="Get role by id",
 *     description="Get role by id",
 *     @SWG\Parameter(
 *         description="Role id",
 *         in="path",
 *         name="role_id",
 *         required=true,
 *         type="integer",
 *         format="int32"
 *     ),
 *     @SWG\Response(response=200, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *
 *
 *
 * * @SWG\Post(
 *     tags={"Roles"},
 *     path="/roles/create",
 *     summary="Create role",
 *     description="Create role",
 *     @SWG\Parameter(
 *         name="role",
 *         in="body",
 *         required=true,
 *         @SWG\Schema(
 *             @SWG\Property(
 *                 property="name",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="label",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="permissions[]",
 *                 type="string",
 *             ),
 *         )
 *     ),
 *     @SWG\Response(response=200, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=403, description="FORBIDDEN: You do not have the necessary rights."),
 *     @SWG\Response(response=422, description="UNPROCESSABLE ENTITY: Request validations error."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *
 * @SWG\Delete(
 *     tags={"Roles"},
 *     path="/roles/{role_id}",
 *     summary="Delete role",
 *     description="Delete role by id",
 *     @SWG\Parameter(
 *         description="role_id",
 *         in="path",
 *         name="role_id",
 *         required=true,
 *         type="string"
 *     ),
 *     @SWG\Response(response=204, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=403, description="FORBIDDEN: You do not have the necessary rights."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *
 * * @SWG\Put(
 *     tags={"Roles"},
 *     path="/api/roles/{role_id}",
 *     summary="Update role",
 *     description="Update role",
 *     @SWG\Parameter(
 *         description="role id",
 *         in="path",
 *         name="role_id",
 *         required=true,
 *         type="integer",
 *         format="int32"
 *     ),
 *     @SWG\Parameter(
 *         name="Role",
 *         in="body",
 *         required=true,
 *         @SWG\Schema(
 *             @SWG\Property(
 *                 property="name",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="label",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="permissions[]",
 *                 type="string",
 *             ),
 *         )
 *     ),
 *     @SWG\Response(response=200, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=403, description="FORBIDDEN: You do not have the necessary rights."),
 *     @SWG\Response(response=422, description="UNPROCESSABLE ENTITY: Request validations error."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *
 *
 */
