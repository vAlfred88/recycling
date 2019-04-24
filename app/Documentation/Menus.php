<?php

/**
 * @SWG\Get(
 *     tags={"Menus"},
 *     path="/menus",
 *     summary="Get Menus list",
 *     description="Get Menus list",
 *
 *     @SWG\Response(response=200, description="OK: The request has succeeded."),
 *     @SWG\Response(response=401, description="UNAUTHORIZED: Authentication required."),
 *     @SWG\Response(response=500, description="INTERNAL SERVER ERROR"),
 *     security={{"Bearer":{}}}
 * )
 *  * @SWG\Get(
 *     tags={"Menus"},
 *     path="/menus/{menu_id}",
 *     summary="Get menu by id",
 *     description="Get menu by id",
 *     @SWG\Parameter(
 *         description="menu id",
 *         in="path",
 *         name="menu_id",
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
 *     tags={"Menus"},
 *     path="/menus/create",
 *     summary="Create menu",
 *     description="Create menu",
 *     @SWG\Parameter(
 *         name="menu",
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
 *                 property="icon",
 *                 type="string",
 *             ),
 *             @SWG\Property(
 *                 property="url",
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
 *     tags={"Menus"},
 *     path="/menus/{menu_id}",
 *     summary="Delete menu",
 *     description="Delete menu by id",
 *     @SWG\Parameter(
 *         description="menu_id",
 *         in="path",
 *         name="menu_id",
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
 *     tags={"Menus"},
 *     path="/api/menus/{menu_id}",
 *     summary="Update menu",
 *     description="Update menu",
 *     @SWG\Parameter(
 *         description="menu id",
 *         in="path",
 *         name="menu_id",
 *         required=true,
 *         type="integer",
 *         format="int32"
 *     ),
 *     @SWG\Parameter(
 *         name="Menu",
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
 *                 property="icon",
 *                 type="string",
 *             ),
 *             @SWG\Property(
 *                 property="url",
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
