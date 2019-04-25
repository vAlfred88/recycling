<?php

/**
 * @SWG\Get(
 *     tags={"User"},
 *     path="/users",
 *     summary="Get users",
 *     description="Get users list",
 *
 *     @SWG\Response(response=200, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=403, description="FORBIDDEN: You do not have the necessary rights."),
 *     @SWG\Response(response=422, description="UNPROCESSABLE ENTITY: Request validations error."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *
 * @SWG\Post(
 *     tags={"User"},
 *     path="/users",
 *     summary="Create a user",
 *     description="Create new user into database",
 *     @SWG\Parameter(
 *         name="User",
 *         in="body",
 *         required=true,
 *         @SWG\Schema(
 *             @SWG\Property(
 *                 property="roles",
 *                 type="integer"
 *             ),
 *             @SWG\Property(
 *                 property="name",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="position",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="phone",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="permissions",
 *                 type="boolean"
 *             ),
 *         )
 *     ),
 *     @SWG\Response(response=201, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=403, description="FORBIDDEN: You do not have the necessary rights."),
 *     @SWG\Response(response=422, description="UNPROCESSABLE ENTITY: Request validations error."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *
 * @SWG\Get(
 *     tags={"User"},
 *     path="/users/{user}",
 *     summary="Get user",
 *     description="Get one user by id",
 *     @SWG\Parameter(
 *         description="User id",
 *         in="path",
 *         name="user",
 *         required=true,
 *         type="integer",
 *         format="int32"
 *     ),
 *     @SWG\Response(response=200, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=403, description="FORBIDDEN: You do not have the necessary rights."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *
 * @SWG\Put(
 *     tags={"User"},
 *     path="/users/{user}",
 *     summary="Update user",
 *     description="Update user",
 *     @SWG\Parameter(
 *         description="User id",
 *         in="path",
 *         name="user",
 *         required=true,
 *         type="integer",
 *         format="int32"
 *     ),
 *     @SWG\Parameter(
 *         name="User",
 *         in="body",
 *         required=true,
 *         @SWG\Schema(
 *             @SWG\Property(
 *                 property="id",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="name",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="email",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="position",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="phone",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="preview",
 *                 type="string",
 *             ),
 *             @SWG\Property(
 *                 property="role",
 *                 type="string",
 *             ),
 *             @SWG\Property(
 *                 property="permissions",
 *                 type="integer",
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
 *     tags={"User"},
 *     path="/users/{user}",
 *     summary="Delete user",
 *     description="Delete user by id",
 *     @SWG\Parameter(
 *         description="User id",
 *         in="path",
 *         name="user",
 *         required=true,
 *         type="integer",
 *         format="int32"
 *     ),
 *     @SWG\Response(response=200, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=403, description="FORBIDDEN: You do not have the necessary rights."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
*       @SWG\Post(
 *     tags={"User"},
 *     path="/users/sendmail",
 *     summary="Send mail to users",
 *     description="Send email to invite user",
 *     @SWG\Parameter(
 *         name="User",
 *         in="body",
 *         required=true,
 *         @SWG\Schema(
 *             @SWG\Property(
 *                 property="name",
 *                 type="string"
 *             ),
 *             @SWG\Property(
 *                 property="email",
 *                 type="string"
 *             ),
 *         )
 *     ),
 *     @SWG\Response(response=200, description="Null"),
 *     @SWG\Response(response=403, description="FORBIDDEN: You do not have the necessary rights."),
 *     @SWG\Response(response=422, description="UNPROCESSABLE ENTITY: Request validations error."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 */
